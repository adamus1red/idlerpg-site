#!/usr/bin/perl -w
# idlerpg-adv (11-22-2003) by daxxar (http://mental.mine.nu)
# Usage: ./idlerpg-adv.pl [playernames]
#
# Call this script from the command line, or your login profile.
use strict;
use LWP::Simple;

# Use cookies:
# %user - username, %class - class, %level - level,
# %next - time to next level, %status - online status,
# %uhost - nick!ident@host, %ca - created at,
# %llo - last logged on, %ti - total idletime,
# %items - list of items, %penalties - list of penalties (special; multiline)
#
# Each comma-separated element is printed with a newline at the end :) 

my @string = (
             '[User] %user', '[Class] %class', '[Level] %level', '[Next level] %next',
             '[Status] %status', '[User@host] %uhost', '[Created at] %ca',
             '[Last logged on] %llo', '[Total idle] %ti', '[Items] %items',
	     '[Penalties] %penalties'
             );

### No need to change below ###
# For printing things in a columnized view
# print_col(\@list_of_entries, \@value_of_entries, $number_per_line)
sub make_col {
   my $entryname = shift;
   my $entryvalue = shift;
   my $count = shift;
   my @len;
   my $ret;
   # Find maximum length for each of the $count columns
   for my $x (0 .. $#{$entryvalue}) {
      my $col = $x % $count;
      if (!defined($len[$col]) || $len[$col] < length($entryvalue->[$x] . $entryname->[$x])) {
         $len[$col] = length("$entryvalue->[$x]"."$entryname->[$x]");
      }
   }
   for my $t (0 .. $#$entryvalue) {
      if (!($t % $count)) { $ret .= "\n   "; }
      $ret .= "$entryname->[$t]\($entryvalue->[$t]\)"; 
      $ret .= ' ' x ($len[$t % $count] - length($entryname->[$t] . $entryvalue->[$t]) + 1);
   }
   return $ret;
}
sub time_to {
   my @timeunits = ('yr', 'month', 'week', 'day', 'hr', 'min', 'sec');
   my @timecalc = (31104000, 2592000, 604800, 86400, 3600, 60, 1);
   my $seconds = shift; my $output;
   if ($seconds == 0) { return "0 seconds"; }
   for my $x (0 .. $#timecalc) {
     my $y = int($seconds / $timecalc[$x]);
     if ($y != 0 && $seconds != 0 && $seconds >= $timecalc[$x]) {
        $seconds = ($seconds % $timecalc[$x]);
        $output .= "$y $timeunits[$x]";
        $output .= 's' unless $y == 1;
	if ($seconds == 0) { last; }
        $output .= ', ' if $x < $#timecalc - 1 && ($seconds % $timecalc[$x+1]) && $seconds != 0;
        $output .= ' and ' if !($seconds % $timecalc[$x+1]);
     }
  }
  return $output;
}
sub time_from {
   my $seconds = shift;
   my ($sec, $min, $hr, $day, $mo, $yr, $wday) = localtime($seconds);
   $mo = ('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Oct', 'Sep', 'Nov', 'Dec')[$mo];
   $wday = ('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat')[$wday];
   $yr += 1900;
   if ($hr < 10) { $hr = "0$hr"; }
   if ($min < 10) { $min = "0$min"; }
   if ($sec < 10) { $sec = "0$sec"; }
   if ($day < 10) { $day .= ' '; }
   return "$wday $mo $day $hr:$min:$sec $yr";
}
die "Usage: $0 <playernames>\n" .
    "Example: $0 daxxar cyb\n" if @ARGV == 0;

start:
my $username = shift(@ARGV);
my $page = get "http://jotun.ultrazone.org/g7/dump.php?player=$username";

# Only line is commented if there is no such user 
if ($page =~ /^#[^\n]+$/) { print "$username: no such user\n"; exit 1; }
($page) = ($page =~ /\n([^#].*)/); # Remove the comment

# @ent = entries on page, \t separated.
my @ent = split(/\t/, $page);

# Assign each tab-separated entry to its hash-key 
my %values = (
   'user'     => $ent[0], 'level'  => $ent[1],
   'class'    => $ent[2], 'next'   => $ent[3],
   'host'     => $ent[4], 'status' => $ent[5],
   'totalidle'=> $ent[6], 'created'=> $ent[14],
   'lastlog'  => $ent[15],
   'penaltynames' => [ qw(msg nick part kick quit quest logout) ],
   'penaltytimes' => [ @ent[7 .. 13] ],
   'itemnames' => [ qw(amulet charm helm boots gloves ring leggings shield tunic weapon sum) ],
   'itemlvls' => [ @ent[16 .. 25] ]
);
$values{'next'}      = time_to  ($values{'next'}); 
$values{'totalidle'} = time_to  ($values{'totalidle'});
$values{'lastlog'}   = time_from($values{'lastlog'});
$values{'created'}   = time_from($values{'created'});
if ($values{'status'}) {$values{'status'} = 'Online'}
else {$values{'status'} = 'Offline'}

foreach my $str (@{[ @string ]}) {
   $str =~ s/%user/$values{'user'}/g;
   $str =~ s/%class/$values{'class'}/g;
   $str =~ s/%level/$values{'level'}/g;
   $str =~ s/%next/$values{'next'}/g;
   $str =~ s/%status/$values{'status'}/g;
   $str =~ s/%uhost/$values{'host'}/g;
   $str =~ s/%ca/$values{'created'}/g;
   $str =~ s/%llo/$values{'lastlog'}/g;
   $str =~ s/%ti/$values{'totalidle'}/g;
   if ($str =~ /%penalties/) {
      my @penaltyname = qw(msg nick part kick quit quest logout);
      my @penaltytime = @ent[7 .. 13];
      for my $t (0 .. $#penaltytime) { $penaltytime[$t] = time_to($penaltytime[$t]); }
      my $cols = make_col(\@penaltyname, \@penaltytime, 3);
      $str =~ s/%penalties/$cols/g;
   }
   if ($str =~ /%items/) {
      my @itemname = qw(amulet charm helm boots gloves ring leggings shield tunic weapon sum);
      my @itemlvls = @ent[16 .. 25];
      # Yay, lets get a nice sum(sum) in output! :D
      my $sum; map($sum += $_, @itemlvls);
      my $cols = make_col(\@itemname, [ @itemlvls, $sum ], 3);
      $str =~ s/%items/$cols/g;
   }
   $str =~ s///g;
   $str =~ s///g;
   print "$str\n";
}

print "\n" if @ARGV != 0;
goto start if @ARGV != 0;

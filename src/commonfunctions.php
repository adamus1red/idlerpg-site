<?php
    function duration($s) {
        $s = abs(intval($s));
        if ($s == 0) return "None";
        return sprintf("%d day%s, %02d:%02d:%02d",
                       $s/86400,intval($s/86400)==1?"":"s",
                       ($s%86400)/3600,($s%3600)/60,$s%60);
    }
    function cmp_level_asc($a,$b) { return cmp_level_desc($b,$a); }
    function cmp_level_desc($a,$b) {
        list(,,,$level1,,$time1)=explode("\t",trim($a));
        list(,,,$level2,,$time2)=explode("\t",trim($b));
        if ($level1 == $level2) return ($time1 <= $time2) ? -1 : 1;
        return ($level1 > $level2) ? -1 : 1;
    }
    function cmp_alignment_asc($a,$b) { return cmp_alignment_desc($b,$a); }
    function cmp_alignment_desc($a,$b) {
        list(,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,$a1)=explode("\t",trim($a));
        list(,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,$a2)=explode("\t",trim($b));
        if ($a1 == "g" || $a2 == "e") return -1;
        if ($a1 == "e" || $a2 == "g") return 1;
        return 0;
    }
    function cmp_isadmin_asc($a,$b) { return cmp_isadmin_desc($b,$a); }
    function cmp_isadmin_desc($a,$b) {
        list(,,$o1)=explode("\t",trim($a));
        list(,,$o2)=explode("\t",trim($b));
        return ($o1 > $o2) ? -1 : 1;
    }
    function cmp_ttl_asc($a,$b) { return cmp_ttl_desc($b,$a); }
    function cmp_ttl_desc($a,$b) {
        list(,,,,,$time1)=explode("\t",trim($a));
        list(,,,,,$time2)=explode("\t",trim($b));
        return ($time2 < $time1) ? -1 : 1;
    }
    function cmp_user_asc($a,$b) { return cmp_user_desc($b,$a); }
    function cmp_user_desc($a,$b) {
        list($u1)=explode("\t",trim($a));
        list($u2)=explode("\t",trim($b));
        return (strtolower($u1) > strtolower($u2)) ? -1 : 1;
    }
    function cmp_online_asc($a,$b) { return cmp_online_desc($b,$a); }
    function cmp_online_desc($a,$b) {
        list(,,,,,,,,$o1)=explode("\t",trim($a));
        list(,,,,,,,,$o2)=explode("\t",trim($b));
        return ($o1 > $o2) ? -1 : 1;
    }
    function cmp_idled_asc($a,$b) { return cmp_idled_desc($b,$a); }
    function cmp_idled_desc($a,$b) {
        list(,,,,,,,,,$i1)=explode("\t",trim($a));
        list(,,,,,,,,,$i2)=explode("\t",trim($b));
        return ($i1 > $i2) ? -1 : 1;
    }
    function cmp_created_asc($a,$b) { return cmp_created_desc($b,$a); }
    function cmp_created_desc($a,$b) {
        list(,,,,,,,,,,,,,,,,,,,$i1)=explode("\t",trim($a));
        list(,,,,,,,,,,,,,,,,,,,$i2)=explode("\t",trim($b));
        return ($i1 > $i2) ? -1 : 1;
    }
    function cmp_lastlogin_asc($a,$b) { return cmp_lastlogin_desc($b,$a); }
    function cmp_lastlogin_desc($a,$b) {
        list(,,,,,,,,,,,,,,,,,,,,$i1)=explode("\t",trim($a));
        list(,,,,,,,,,,,,,,,,,,,,$i2)=explode("\t",trim($b));
        return ($i1 > $i2) ? -1 : 1;
    }
    function cmp_uhost_asc($a,$b) { return cmp_uhost_desc($b,$a); }
    function cmp_uhost_desc($a,$b) {
        list(,,,,,,,$u1)=explode("\t",trim($a));
        list(,,,,,,,$u2)=explode("\t",trim($b));
        return (strtolower($u1) > strtolower($u2)) ? -1 : 1;
    }
    function cmp_pen_asc($a,$b) { return cmp_pen_desc($b,$a); }
    function cmp_pen_desc($a,$b) {
        list(,,,,,,,,,,,,$p1[0],$p1[1],$p1[2],$p1[3],$p1[4],$p1[5],
        $p1[6])=explode("\t",trim($a));
        list(,,,,,,,,,,,,$p2[0],$p2[1],$p2[2],$p2[3],$p2[4],$p2[5],
        $p2[6])=explode("\t",trim($b));
        $s1 = $s2 = 0;
        foreach ($p1 as $pen) $s1 += $pen;
        foreach ($p2 as $pen) $s2 += $pen;
        return ($s1 > $s2) ? -1 : 1;
    }
    function cmp_sum_asc($a,$b) { return cmp_sum_desc($b,$a); }
    function cmp_sum_desc($a,$b) {
        list(,,,,,,,,,,,,,,,,,,,,,$i1[0],$i1[1],$i1[2],$i1[3],$i1[4],$i1[5],
        $i1[6],$i1[7],$i1[8],$i1[9])=explode("\t",trim($a));
        list(,,,,,,,,,,,,,,,,,,,,,$i2[0],$i2[1],$i2[2],$i2[3],$i2[4],$i2[5],
        $i2[6],$i2[7],$i2[8],$i2[9])=explode("\t",trim($b));
        $s1 = $s2 = 0;
        foreach ($i1 as $item) { $s1 += $item; }
        foreach ($i2 as $item) $s2 += $item;
        return ($s1 > $s2) ? -1 : 1;
    }
?>

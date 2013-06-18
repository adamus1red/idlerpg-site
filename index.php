<?php
    include("config.php");
    $irpg_page_title = "Game Info";
    include("header.php");
?>
    <h1>Game Info</h1>
    <p>The Idle RPG is just what it sounds like: an RPG in which the players
    idle. In addition to merely gaining levels, players can find items and
    battle other players. However, this is all done for you; you just idle.
    There are no set classes; you can name your character anything you like, and
    have its class be anything you like, as well.</p>

    <h2>Location</h2>
    <p> 
      The Idle RPG can be played on the
      <a href="<?php echo $net_url;?>"><?php echo $net_name;?>Network</a> in the
      channel <?php echo $irpg_chan;?>.
    </p>
    

    <h2>Registering</h2>
    
      <p>To register, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> REGISTER &lt;char name&gt; &lt;password&gt;
          &lt;char class&gt;
        </code>
      
      <p>Where 'char name' can be up to 16 chars long, 'password' can be up
      to 8 characters, and 'char class' can be up to 30 chars.</p>
    

    <h2>Logging In</h2>
    
      <p>To login, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> LOGIN &lt;char name&gt; &lt;password&gt;
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
    

    <h2>Logging Out</h2>
    
      <p>To logout, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> LOGOUT
        </code>
      
      <p>This is a p20 (see <a href="#penalties">Penalties</a>) command.</p>
    

    <h2>Changing Your Password</h2>
    
      <p>To change your password, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> NEWPASS &lt;new password&gt;
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
      <p>If you have forgotten your password, please use the <a href="#info">
      INFO</a> command to find an online admin to help you. If your
      administrator does not have the INFO command enabled, then just message
      an op in the channel. They can probably help you.</p>
    

    <h2>Removing Your Account</h2>
    
      <p>To remove your account, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> REMOVEME
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command :^)</p>
    

    <h2>Changing Your Alignment</h2>
    
      <p>To change your alignment, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> ALIGN &lt;good|neutral|evil&gt;
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
      <p>Your alignment can affect certain aspects of the game. You may align
      with good, neutral, or evil. 'Good' users have a 10% boost to their item
      sum for battles, and a 1/12 chance each day that they, along with a
      'good' friend, will have the light of their god shine upon them,
      accelerating them 5-12% toward their next level. 'Evil' users have a 10%
      detriment to their item sum for battles (ever forsaken in their time of
      most need...), but have a 1/8 chance each day that they will either a)
      attempt to steal an item from a 'good' user (whom they cannot help but
      hate) or b) be forsaken (for 1-5% of their TTL) by their evil god. After
      all, we all know that crime doesn't pay. Also, 'good' users have only a
      1/50 chance of landing a <a href="#critstrike">Critical Strike</a> when
      battling, while 'evil' users (who always fight dirty) have a 1/20
      chance. Neutral users haven't had anything changed, and all users start
      off as neutral.</p>
      <p>I haven't run the numbers to see which alignment it is better to
      follow, so the stats for this feature may change in the future.</p>
    
    
    <a name="info"></a><h2>Obtaining Bot Info</h2>
    
      <p>To see some simple information on the bot, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> INFO
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
      <p>This command gives info such as to which server the bot is connected
      and the nicknames of online bot admins.</p>
      <p>This command is optional, and may be disabled by your bot admin.</p>
    
    

    <h2>Levelling</h2>
    
      <p>To gain levels, you must only be logged in and idle. The time
      between levels is based on your character level, and is calculated
      by the formula:</p>
      
        600*(1.16^YOUR_LEVEL)
      
      <p>Where ^ represents the exponentiation operator.</p>
      <p>Very high levels are calculated differently as of version 3.0. Levels
      after level 60 have a next time to level of:</p>
      
        (time to level @ 60) + ((1 day) * (level - 60))
      
      <p>The exponent method code had simply gotten to that point that levels
      were taking too long to complete.</p>
    

    <h2>Checking the Active Quest</h2>
    
      <p>To see the active quest, its users, and its time left to
      completion:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> QUEST
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
    

    <h2>Checking Your Online Status</h2>
    
      <p>To see whether you are logged on, simply:</p>
      
        <code>
          /msg <?php echo $irpg_bot;?> WHOAMI
        </code>
      
      <p>This is a p0 (see <a href="#penalties">Penalties</a>) command.</p>
    

    <a name="penalties"></a><h2>Penalties</h2>

    
      <p>If you do something other than idle, like part, quit, talk in the
      channel, change your nick, or notice the channel, you are
      penalized. The penalties are time, in seconds, added to your next
      time to level and are based on your character level. The formulae
      are as follows:</p>

      <table id="penalty" class="penalty">
        <tr>
          <th>Nick change</th>
          <td>30*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>Part</th>
          <td>200*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>Quit</th>
          <td>20*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>LOGOUT command</th>
          <td>20*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>Being Kicked</th>
          <td>250*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>Channel privmsg</th>
          <td>[message_length]*(1.14^(YOUR_LEVEL))</td>
        </tr>
        <tr>
          <th>Channel notice</th>
          <td>[message_length]*(1.14^(YOUR_LEVEL))</td>
        </tr>
      </table>
      <br />
      <p>So, a level 25 character changing their nick would be penalized
      20*(1.14^25)=793 seconds towards their next level.</p>
      <p>Penalty shorthand is p[num]. So, a nick change is a p30 event,
      parting the channel is a p200 event, and quitting IRC is a p20 event.
      Messages and notices are p[length of message in characters].</p>
    

    <h2>Items</h2>
    
      <p>Each time you level, you find an item. You can find an item as
      high as 1.5*YOUR_LEVEL (unless you find a <a href="#uniqueitems">
      unique item</a>). There are 10 types of items: rings,
      amulets, charms, weapons, helms, tunics, gloves, leggings,
      shields, and boots. You can find one of each type. When you find
      an item with a level higher than the level of the item you already
      have, you toss the old item and start using the new one. As of version
      3.0, there is an optional, p0 STATUS command that your admin may have
      enabled, but you cannot see which items you have over IRC (only your
      total item sum). You can, however, see which items you have on the web
      <a href="players.php">here</a>.</p>

      <p>As you may guess, you have a higher chance of rolling an item of a
      lower value than you do of rolling one of a higher value level. The exact
      formula is as follows:</p>

      
           for each 'number' from 1 to YOUR_LEVEL*1.5<br />
           &nbsp;&nbsp;you have a 1 / ((1.4)^number) chance to find an
           item at this level<br />
           end for
      

      <p>As for item type, you have an equal chance to roll any type.</p>
    


    <h2>Battle</h2>
    
      <p>Each time you level, if your level is less than 25, you have a 25%
      chance to challenge someone to combat. If your level is greater than or
      equal to 25, you have a 100% chance to challenge someone. A pool of
      opponents is chosen of all online players, and one is chosen randomly. If
      there are no other online players, you fight no one. However, if you do
      challenge someone, this is how the victor is decided:</p>

      <ul>
          <li>Your item levels are summed.</li>
          <li>Their item levels are summed.</li>
          <li>A random number between zero and your sum is taken.</li>
          <li>A random number between zero and their sum is taken.</li>
          <li>If your roll is larger than theirs, you win.</li>
      </ul>

      <p>If you win, your time towards your next level is lowered. The amount
      that it is lowered is based on your opponent's level. The formula is:</p>

      
         ((the larger number of (OPPONENT_LEVEL/4) and 7) / 100) *
         YOUR_NEXT_TIME_TO_LEVEL
      

      <p>This means that you lose no less than 7% from your next time to level.
      If you win, your opponent is not penalized any time, unless you land a
      <a href="#critstrike">Critical Strike</a>.</p>

      <p>If you lose, you will be penalized time. The penalty is calculated
      using the formula:</p>

      
        ((the larger number of (OPPONENT_LEVEL/7) and 7) / 100) *
        YOUR_NEXT_TIME_TO_LEVEL
      

      <p>This means that you gain no less than 7% of your next time to level.
      If you lose, your opponent is not awarded any time.</p>

      <p>Battling the IRPG bot is a special case. The bot has an item sum of
      1+[highest item sum of all players]. The percent awarded if you win is a
      constant 20%, and the percent penalized if you lose is a constant 10%.</p>

      <p>As of version 3.0, if more than 15% of online players are level 45 or
      higher, then a random level 45+ user will battle another random player
      every hour. This is to speed up levelling among higher level players.</p>

      <p>Also as of version 3.0, there is a grid system. The grid is a 500 x 500
      area in which players may walk. If you encounter another player on the
      grid, you have a 1 / (NUMBER_OF_ONLINE_PLAYERS) chance to battle them.
      Battle awards are calculated using the above formulae. More information
      on the grid system is available <a href="#grid">here</a>.</p>
      
      <p>Also as of version 3.0, a successful battle may result an item being
      <a href="#stealing">stolen</a>.</p>
    
    
    <a name="uniqueitems"></a><h2>Unique Items</h2>
    
      <p>As of v2.1.2, after level 25, you have a chance to roll items
      significantly higher than items you would normally find at that level.
      These are unique items, and have the following stats:</p>
      <table id="uniques" class="uniques">
        <tr>
          <th>Name</th>
          <th>Item Level Range</th>
          <th>Required User Level</th>
          <th>Chance to Roll</th>
        </tr>
        <tr>
          <th>Mattt's Omniscience Grand Crown</th>
          <td>50-74</td>
          <td>25 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Juliet's Glorious Ring of Sparkliness</th>
          <td>50-74</td>
          <td>25 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Res0's Protectorate Plate Mail</th>
          <td>75-99</td>
          <td>30 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Dwyn's Storm Magic Amulet</th>
          <td>100-124</td>
          <td>35 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Jotun's Fury Colossal Sword</th>
          <td>150-174</td>
          <td>40 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Drdink's Cane of Blind Rage</th>
          <td>175-200</td>
          <td>45 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Mrquick's Magical Boots of Swiftness</th>
          <td>250-300</td>
          <td>48 or greater</td>
          <td>1 / 40</td>
        </tr>
        <tr>
          <th>Jeff's Cluehammer of Doom</th>
          <td>300-350</td>
          <td>52 or greater</td>
          <td>1 / 40</td>
        </tr>
      </table>
    
    <h2>The Hand of God</h2>
    
      <p>As of v3.0, every online user has a (roughly) 1/20 chance per day
      of a "Hand of God" affecting them. A HoG can help or hurt your character
      by carrying it between 5 and 75 percent towards or away from its next time
      to level. The odds are in your favor, however, with an 80% chance to help
      your character, and only a 20% chance of your character being smitten.</p>

      <p>In addition to occurring randomly, admins may summon the HoG at their
      whim.</p>
    

    <a name="critstrike"></a><h2>Critical Strike</h2>
    
      <p>As of v2.0.4, if a challenger beats his opponent in battle, he has a
      1/35 chance of landing a Critical Strike. If this occurs, his opponent
      is penalized time towards his next time to level. This amount is
      calculated by the formula:</p>
      
        ((random number from 5 to 25) / 100) * OPPONENT'S_NEXT_TIME_TO_LEVEL
      
      <p>Meaning he gains no less than 5% and no more than 25% of his next time
      to level.</p>
    

    <h2>Team Battles</h2>
    
      <p>As of v3.0, every online user has (roughly) 1/4 chance per day of
      being involved in a  'team battle.' Team battles pit three online
      players against three other online players. Each side's items are summed,
      and a winner is chosen as in regular battling. If the first group bests
      the second group in combat, 20% of the lowest of the three's TTL is
      removed from their clocks. If the first group loses, 20% of their lowest
      member's TTL is added to their TTL.</p>
    

    <h2>Calamities</h2>
    
      <p>As of v3.0, every online user has a (roughly) 1/8 chance per day of a
      calamity occurring to them. A calamity is a bit of extremely bad luck that
      either:<br />
      
          a) slows a player 5-12% of their next time to level<br />
          b) lowers one of their item's value by 10%
      
      </p>
    

    <h2>Godsends</h2>
    
      <p>As of v3.0, every online user has a (roughly) 1/8 chance per day of a
      godsend occurring to them. A godsend is a bit of extremely good luck that
      either:<br />
      
          a) accelerates a player 5-12% of their next time to level<br />
          b) increases one of their item's value by 10%
      
      </p>
    

    <h2>Quests</h2>
    
      <p>As of v2.3, there are Quests. Four level 40+ users that have been
      online for more than ten hours are chosen to represent and assist the
      Realm by going on a quest. If all four users make it to the quest's end,
      all questers are awarded by removing 25% of their TTL (ie, their TTL at
      quest's end). To complete a quest, no user can be penalized until the
      quest's end. As of v3.0, there are two kinds of quests: grid-based quests
      and time-based quests. Time-based quests last a random time between 12 and
      24 hours. Grid-based quests are based on the <a href="#grid">grid
      system</a> and do not have a set time to completion. Rather, the questers
      must reach certain points on the map for their quest to be complete. If
      the quest is not completed, ALL online users are penalized a p15 as
      punishment.</p>
    
    
    <a name="grid"></a><h2>Grid System</h2>
    
      <p>As of v3.0, the IRPG has a grid system. The grid can be considered
      a 500 x 500 point map on which the players may walk. Every second, each
      player has an equal chance to step up, down, or neither, and an equal
      chance to step left, right, or neither. If a user encounters another
      player, there is a 1/(NUMBER_OF_ONLINE_PLAYERS) chance that they will
      battle one another. Normal battling rules apply.</p>
      
      <p>Some quests require that users walk to certain points on the map. In
      the spirit of IRPG, of course, the trek is made for you. Your character
      will automatically walk in the direction that it is supposed to, although
      at a much slower than normal pace (to avoid accidents, of course. you
      don't want to fall down and risk a Realm-wide p15!).</p>
    
    
    <a name="stealing"></a><h2>Item Stealing</h2>
    
      <p>As of v3.0, the IRPG has item stealing. After each battle, if the
      challenger wins, he has a slightly less than 2% chance of stealing an
      item from the challengee. Only items of a higher value are stolen, and
      the challenger's old item is given to the challengee in a moment of pity.
      </p>
    


    <h2>Credits</h2>
    
      <p>Many thanks to version 3.0's map creators, res0 and Jeb! The game
      wouldn't be the same without you.</p>
      <p>
        The IRPG would not be possible without help from a lot of people.
        To jwbozzy, yawnwraith, Tosirap, res0, dwyn, Parallax, protomek,
        Bert, clavicle, drdink, jeff, rasher, Sticks, Nerje, Asterax,
        emad, inkblot(!), schmolli, mikegrb, mumkin, sean, Minhiriath,
        and Dan, I give many thanks. Unfortunately, this list has grown too
        large to maintain. More user contributions can be seen in the
        <a href="http://idlerpg.net/ChangeLog.txt">ChangeLog</a>.
      </p>
    

<?php include("footer.php");?>


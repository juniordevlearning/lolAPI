
<? //var_dump($players) ?>

All Challanger Players

<form method="post" action="">
    Regien: 
    <select name="region">
        <option value="BR">Brasil</option>
        <option value="EUW">Europe West</option>
        <option value="EUNE">Europe North-East</option>
    </select>

    League: 
    <select name="league" >
        <option value="challanger">Challanger</option>
        <option value="grandmaster">Grandmaster</option>
        <option value="master">Master</option>
    </select>

    Queue: 
    <select name="queueType" >
        <option value="solo_5x5">Solo 5 vs 5</option>
        <option value="flex_team">Flex Full Team</option>
        <option value="flex">Flex</option>
    </select>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<ul>
    <?php foreach($players as $player): ?>
        <li>Name: <?= $player['summonerName'] ?></li>
        <li>Points: <?= $player['leaguePoints'] ?></li>
        <li>Rank: <?= $player['rank'] ?></li>
        <li>Wins: <?= $player['wins'] ?></li>
        <li>Losses: <?= $player['losses'] ?></li>
        <li>Hot streak: <?= $player['hotStreak'] ?></li>
    <?php endforeach ?>
</ul>
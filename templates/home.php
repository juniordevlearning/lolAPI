
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>LoL API</title>
    <!-- Get Bootstrap 4 -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<nav></nav>
<main class="container">
    
<h1>Top 20 Challanger Players</h1>

<form method="post" action="">

    <div class="form-group">
        Regien: 
        <select name="region">
            <option value="BR">Brasil</option>
            <option value="EUW">Europe West</option>
            <option value="EUNE">Europe North-East</option>
        </select>
    </div>
    <div class="form-group">
        League: 
        <select name="league" >
            <option value="challanger">Challanger</option>
            <option value="grandmaster">Grandmaster</option>
            <option value="master">Master</option>
        </select>
    </div>
    <div class="form-group">
        Queue: 
        <select name="queueType" >
            <option value="solo_5x5">Solo 5 vs 5</option>
            <option value="flex_team">Flex Full Team</option>
            <option value="flex">Flex</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<div class="row">
    <?php foreach($players as $player): ?>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: <?= $player['summonerName'] ?></h5>
                <p>Points: <?= $player['leaguePoints'] ?></p>
                <p>Wins: <?= $player['wins'] ?></p>
                <p>Losses: <?= $player['losses'] ?></p>
                <p>Hot streak: <?= $player['hotStreak'] ?></p>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>
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
</main>
</html>
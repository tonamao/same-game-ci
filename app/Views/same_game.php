<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>SameGame</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body>
    <div id="game-frame">
      <div class="rule-bar">
        <div class="rule">Cleared with remaining <span id="clear-num"></span> / 100!!</div>
      </div>
      <div id="canvasParent" class="canvas-parent">
        <canvas id="canvas"></canvas>
      </div>
      <div class="status-bar">
        <div class="game-rest">Block : <span id="rest"></span>/<span id="param"></span></div>
        <div class="game-score">Score : <span id="score"></span></div>
        <div class="game-result"><span id="result"></span></div>
      </div>
    </div>
    <?php ##-START-----------------?>
    <div class="modal fade modal-dialog-centered" id="clearModal" tabindex="-1" role="dialog" aria-labelledby="clear-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-overlay">
                <div class="modal-content" id="modalContent">
                    <div class="modal-header">
                        <h5 class="modal-title" id="clear-label">SCORE RESULT</h5>
                        <button type="button" class="close clear-modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="clearModalBody">
                            <h4>Your Score : <div id="modalScore" class="modal-score"></div></h4>
                        </div>
                        <div class="clear-modal-body ranking">
                            <table class="table table-sm table-bordered">
                                <?php if (!empty($score_history)) { ?>
                                <h5>SCORE RANKING</h5>
                                <thead>
                                <tr align="center">
                                    <th scope="col">RANK</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">SCORE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($score_history as $history): ?>
                                    <tr>
                                        <td scope="row" align="center"></td>
                                        <td><?php echo $history['guest_name']; ?></td>
                                        <td align="right"><?php echo $history['game_score']; ?></td>
                                    </tr>
                                <?php endforeach;
                                }
                                ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary clear-modal-close" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary clear-modal-close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ##-END-----------------?>
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

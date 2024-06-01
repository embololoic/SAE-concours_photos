<?php require('./views/blocks/header.php'); ?>
    <h4 style="text-align: center;">Nombre total des votes : <?php echo $votes_total; ?></h4>
    <div class="vote-results">
        <?php foreach ($votes_by_photo as $vote): ?>
            <div class="photo-container">
                <img src="<?php echo $vote['file_path']; ?>" alt="<?php echo $vote['file_path']; ?>">
                <div>
                    <p>La photo <?php echo $vote['id']; ?> a <?php echo $vote['total_votes']; ?> <?php echo ($vote['total_votes'] == 1) ? 'vote' : 'votes'; ?></p>                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php require('./views/blocks/footer.php'); ?>
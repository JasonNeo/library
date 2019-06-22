<?php
$subjectName = '';
foreach($subjects as $subject) {
    if($subject['subjectId'] == $book['subjectId']) {
        $subjectName = $subject['subject'];
    }
}
?>

<div class="container mt-5">
    <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col">
            <dl>
                <dt>Title</dt>
                <dd><h1><?= $book['title'] ?></h1></dd>
                <div class="row">
                    <div class="col">
                        <dt>Author</dt>
                        <dd><?= $book['author'] ?></dd>
                        <dt>Subject</dt>
                        <dd><?= $subjectName ?></dd>
                        <dt>Description</dt>
                        <dd><?= $book['description'] ?></dd>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <?php
                    if ($book['availability'] == 1):
                        $isLoggedIn = $this->session->userdata('isLoggedIn');
                        if (!$isLoggedIn):
                ?>
                            <p>You must be logged in to place a hold on this.</p>
                <?php
                        else:
                ?>
                            <form action="<?= base_url(); ?>user/borrowBook/<?= $book['bookId'] ?>/<?= $userId; ?>" method="post">
                                <button type="submit" class="btn btn-default">Borrow</button>
                            </form>
                <?php
                        endif;
                    else:
                ?>
                    <p>Book is currently unavailable.</p>
                <?php
                    endif;
                ?>
            </dl>
        </div>
    </div>
</div>
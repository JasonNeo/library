<div class="container mt-5">
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
                        <dd><?= $book['subject'] ?></dd>
                        <dt>Description</dt>
                        <dd><?= $book['description'] ?></dd>
                        <dt>Available</dt>
                        <dd><?= $book['availability'] ?></dd>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <form action="<?= base_url(); ?>book/borrow/<?= $book['bookId'] ?>" method="post">
                    <button type="submit" class="btn btn-default">Borrow</button>
                </form>
            </dl>
        </div>
    </div>
</div>
<div class="container result-container">
    <form method="post" action="<?= base_url() ?>home/book/search">
        <div class="input-group mt-5 mb-5">
            <input type="text" class="form-control" placeholder="Search catalogue" name="searchText">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <div class="row mb-3">
        <div class="col-md-3">
            <h2 class="h6"><span class="border-bottom">Refine your results</span></h2>
        </div>
        <div class="col-md-9">
            <h2 class="h6 pull-left"><span class="border-bottom"><?= $count; ?> catalogue results</span></h2>
        </div>
    </div>
    <div class="row">
        <!-- filters -->
        <div class="col-md-3">
            <aside id="result-filter">
                <ul id="accordion">
                    <li class="mb-2">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <button class="btn btn-link dropdown-toggle w-100 text-left dropdown-toggle w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Limit to
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                <div class="checkbox">
                                    <ul>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Full Text
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Peer Reviewed
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Available in Library Collection
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="card">
                            <div class="card-header p-0" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link dropdown-toggle w-100 text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Source Types
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                <div class="checkbox">
                                    <ul>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>All Results
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Academic Journals (4,639,812)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Magazines (766,458)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Patents (256,910)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="card">
                            <div class="card-header p-0" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link dropdown-toggle w-100 text-left" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Location
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                <div class="checkbox">
                                    <ul>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>E-Resource Scl (1,615)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Open_Shelf Scl (1,123)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>Open_Shelf Syc-Jb (211)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="card">
                            <div class="card-header p-0" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link dropdown-toggle w-100 text-left" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Subject
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                <div class="checkbox">
                                    <ul>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>biology (892,596)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>biological sciences (694,902)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>physical sciences (393,907)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="card">
                            <div class="card-header p-0" id="headingFive">
                                <h5 class="mb-0">
                                    <button class="btn btn-link dropdown-toggle w-100 text-left" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Publisher
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                <div class="checkbox">
                                    <ul>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>springer nature (923,034)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>wiley-blackwell (426,054)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>public library of science (302,059)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>taylor & francis ltd (234,281)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span class="cr"><i class="cr-icon fas fa-check"></i></span>oxford university press / usa (194,922)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </aside>
        </div>
        <!-- results -->
        <div class="col-md-9">
            <main id="result-content">
                <ul>
                    <?php
                        foreach($books as $book):
                    ?>
                    <li class="mb-4">
                        <div class="card">
                            <div class="card-header">                           
                                <a href="<?= base_url() . 'book/detail/' . $book['bookId'] ?>">
                                    <div class="card-title-container">
                                        <h5 class="card-title"><?= $book['title'] ?></h5>
                                        <strong><?= $book['author'] ?></strong>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <dl class="d-flex">
                                    <dt class="text-center">
                                        <a href="<?= base_url() . 'book/detail/' . $book['bookId'] ?>">
                                            <img class="mb-1" src="https://via.placeholder.com/100" alt="Textbook frontpage">
                                            <!-- Book -->
                                        </a>
                                    </dt>
                                    <dd class="ml-3">
                                        <?= $book['description'] ?>
                                        <br/><br/>
                                        <strong>Subject</strong>:
                                        <?php
                                            foreach($subjects as $subject):
                                                if($subject['subjectId'] == $book['subjectId']):
                                                    echo $subject['subject'];
                                                endif;
                                            endforeach;
                                        ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </main>
        </div>
    </div>
</div>

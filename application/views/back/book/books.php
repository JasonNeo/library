<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Book Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>user/newBook"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Books List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>user/bookListing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Subject</th>
                        <th>Availability</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($bookRecords))
                    {
                        foreach($bookRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo word_limiter($record->title, 10) ?></td>
                        <td><?php echo $record->author ?></td>
                        <td><?php echo word_limiter($record->description,15) ?></td>
                        <td><?php echo word_limiter($record->subject, 6) ?></td>
                        <td><?php echo $record->availability ?></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'user/editBook/'.$record->bookId; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger" href="#" id="deleteBook" data-bookid="<?php echo $record->bookId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "user/bookListing/" + value);
            jQuery("#searchList").submit();
        });

        // delete book
        jQuery(document).on("click", "#deleteBook", function(){
            var bookId = $(this).data("bookid"),
                hitURL = baseURL + "user/deleteBook",
                currentRow = $(this);
            
            var confirmation = confirm("Are you sure to delete this book ?");
            
            if(confirmation)
            {
                jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : hitURL,
                data : { bookId : bookId } 
                }).done(function(data){
                    console.log(data);
                    currentRow.parents('tr').remove();
                    if(data.status = true) { alert("Book successfully deleted"); }
                    else if(data.status = false) { alert("Book deletion failed"); }
                    else { alert("Access denied..!"); }
                });
            }
        });
    });
</script>
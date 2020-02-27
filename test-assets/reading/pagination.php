<div class="container-fluid">
    <div class="test-footer row">
        <div class="col-md-10 col-9">
            <div class="pagination">
                <ul class="scroll-section">

                <?php
                    $count = 1;
                    $part = 1;
                for ($i=1; $i <=40 ; $i++) {
                    if($count == 10){
                        $count=0;
                    }
                    if($count == 1){
                    
                        echo '<li class="part-name">Part'.($part).' </li>';
                    $part ++;

                    }
                    $count ++;
                $active_class = $i == 1 ? 'highlight' :'';
                    ?> 
                    <li class="pag-index <?php echo $active_class ?> " data-id="<?php echo $i ?>"><?php echo $i ?>
                <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-md-2 col-3">
            <div class="pointers">
                <span class="icon"><i class="fa fa-chevron-left move up" aria-hidden="true"></i></span>
                <span class="icon"><i class="fa fa-chevron-right move down" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
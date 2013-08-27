<div class="container">
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
           <ul class="bxslider">
          <?php foreach($posts as $v):?>
            <li><?php echo $this->Media->image($v['Post']['thumb'], 1100, 500, array('title' => $v['Post']['title'])); ?></li>
            <?php endforeach; ?>
        </ul>
        </div>
    </div>
    
          <div class="row">
              <?php foreach($posts as $v):?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                  <div class="caption">
                    <?php echo $v['Post']['title']; ?>
                      <?php
                      if (isset($v['Post']['thumb'])){
                          echo $this->Media->image($v['Post']['thumb'], 234, 200);
                      }else{
                           echo $this->Html->image('http://placehold.it/234x200');
                      }
                      ?>
                        <?php  echo $v['Post']['body']; ?>
                        <div class="btn-group btn-group-justified">
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-info', 'escape' => false)); ?>
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-heart"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-danger', 'escape' => false)); ?>
                          <?php echo $this->Html->link('<span class="glyphicon glyphicon-comment"></span>', array('action' => 'view', $v['Post']['id']), array('class' => 'btn btn-default', 'escape' => false)); ?>
                        </div>
                    </div>
                </div>
            </div><!--/span-->              
              <?php endforeach; ?>
          </div><!--/row-->
    </div><!--/.container-->
    
    <?php 
    echo $this->Html->css('jquery.bxslider');
    echo $this->Html->script('jquery.bxslider.min');
    ?>
    <script>
        $(document).ready(function() {
            $('.bxslider').bxSlider({
                auto: true,
            });
        });
    </script>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
           <ul class="bxslider">
               <?php //debug($posts); die(); ?>
          <?php foreach($posts as $v):?>
            <li><?php echo $this->Media->image($v['Post']['thumb'], 910, 414, array('title' => $this->Media->image($v['User']['Thumb']['file'], 50, 50, array('class'=>'carousel thumbnail')) ." ". $v['Post']['title'] ." ". $this->Html->link('View', array('action' => 'view', 'controller'=>'posts', $v['Post']['id']), array('class'=>'btn btn-primary pull-right')))); ?></li>
            <?php endforeach; ?>
        </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
      <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12">
          <img class="img-rounded" src="data:image/png;base64," data-src="holder.js/50x50" alt="Generic placeholder image">
          <h4>Lionel</h4>
          <p>Realized 4 wishes</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12">
          <img class="img-rounded" src="data:image/png;base64," data-src="holder.js/50x50" alt="Generic placeholder image">
          <h4>Martin</h4>
          <p>Realized 42 wishes</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12">
          <img class="img-rounded" src="data:image/png;base64," data-src="holder.js/50x50" alt="Generic placeholder image">
          <h4>Etienne</h4>
          <p>Realized 48 wishes</p>

        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

        </div>
    </div>
    
          <div class="row">
              <div class="page-header">
                <h2><span class="glyphicon glyphicon-star"></span>Popular</h2>
              </div>
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
                        <p class="infothumbnail"><?php echo $this->Media->image($v['User']['Thumb']['file'], 30, 30, array('class'=>'img-thumbnail')); ?>
                        <?php echo $v['User']['username']; ?>
                        </p>
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
                captions: true
            });
        });
    </script>

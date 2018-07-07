<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="all">
   
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/gridview.css" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-3.3.1.js"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="dashboard">

<div id="wrap">
<div id="container">


<div id="header" class="header">
            <div id="branding" style="margin-top: 10px">
              <a href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </div>

            
            <div class="header-content header-content-first">
              <div class="header-column icon">
                <i class="icon-time"></i>
              </div>
              <div class="header-column">
                <span class="date"> <?php echo date('l, F Y'); ?></span><br>
                <span class="time" id="clock"> <?php print date("g.i a", time()); ?> <!--Check server time--> </span>
              </div>
            </div>

              <div id="user-tools">
                
                <span class="user-links">
                  <?php
        $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
               
				//array('label'=>'Home', 'url'=>array('/site/index'), 'visible'=>Yii::app()->user->isGuest),
                //array('label'=>'User', 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->isAdmin()),
                array('label'=>'Change Password ', 'url'=>array('/login/changePassword'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
              // array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout") , 'visible'=>!Yii::app()->user->isGuest),      
			),
		)); ?>
		
		 
                  </span>
                
              </div>
            
            
          </div><!--END HEADER-->
           
<div class="suit-columns two-columns">        
<div id="suit-center" class="suit-column">

<!-- Content -->
<div id="content" class="colMS row-fluid">
  <h2 class="content-title">Site administration</h2>
              
  <div id="content-main" style="width:100%">
  
  	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>
	
    <?php echo $content; ?>
  </div>
</div>
<!-- END Content -->

</div>
               
<!--Left Navigation-->          
<div id="suit-left" class="suit-column">
              
<div class="left-nav" id="left-nav">
<?php
        $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'Contact', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),

                array('label'=>'Waiters', 'url'=>array('/login/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Tables', 'url'=>array('/tables/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Categories', 'url'=>array('/category/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Products', 'url'=>array('/product/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Manage Stock', 'url'=>array('/stock/admin'), 'visible'=>!Yii::app()->user->isGuest),
                // array('label'=>'Food Company', 'url'=>array('/foodcompany/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Bills', 'url'=>array('/cart/admin'), 'visible'=>!Yii::app()->user->isGuest),
                // array('label'=>'Tax Setting', 'url'=>array('/tax/update/1'), 'visible'=>!Yii::app()->user->isGuest),
                // array('label'=>'Bill Setting', 'url'=>array('/bill/update/1'), 'visible'=>!Yii::app()->user->isGuest),

                 array(
      'label'=>'Settings',
     'url'=>'javascript:void(0);',
    'linkOptions'=>array('id'=>'Settings'),
      'itemOptions'=>array('id'=>'Settings'),
      'items'=>array(
        array('label'=>'Bill Settings', 'url'=>array('/bill/update/1'),'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'Tax Settings', 'url'=>array('/tax/update/1'),'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'Sales Type', 'url'=>array('/foodcompany/admin','visible'=>!Yii::app()->user->isGuest))
      ),'visible'=>!Yii::app()->user->isGuest
    ),
                //array('label'=>'History', 'url'=>array('/history/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Orderings', 'url'=>array('/booking/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Reports', 'url'=>array('/report/admin'), 'visible'=>!Yii::app()->user->isGuest),
  //              array('label'=>'Rating', 'url'=>array('/rating/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Reservation', 'url'=>array('/reservation/admin'), 'visible'=>!Yii::app()->user->isGuest),

     array(
      'label'=>'Feedback System',
    'url'=>'javascript:void(0);',
    'linkOptions'=>array('id'=>'Feedback'),
      'itemOptions'=>array('id'=>'Feedback'),
      'items'=>array(
        array('label'=>'Rating', 'url'=>array('/rating/admin'),'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'Feedback Queries', 'url'=>array('/query/admin'),'visible'=>!Yii::app()->user->isGuest),
      ),'visible'=>!Yii::app()->user->isGuest
    ),
//                array('label'=>'Feedback Queries', 'url'=>array('/query/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),                           
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
		)); ?>  
</div>

</div>       
</div> 

<div class="clear"></div>
  <div id="footer" class="footer">
    <div class="content">

      
    </div>
  </div>
</div>
</div>
</body>
</html>

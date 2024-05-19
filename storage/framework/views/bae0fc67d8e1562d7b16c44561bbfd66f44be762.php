<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<a class="top-left-corner blue-btn" href="<?php echo e(route('profile')); ?>"><?php echo e(auth()->user()->username); ?></a>
<form action="<?php echo e(route('logout')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <button type="submit" class="bottom-right-corner red-btn" >Logout</button>
  
</form> 
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
<a class="top-left-corner blue-btn" href="<?php echo e(route('login')); ?>">Login</a>
<?php endif; ?>
<a class="top-right-corner blue-btn" href="<?php echo e(route('leaderboard')); ?>">Leaderboard</a>
<div class="main-img">
    <img src="<?php echo e(asset('images/mister_quiz.png')); ?>" alt="">
    <p class="title">Mister Quiz</p>

    <a style="margin-bottom:20px" class="green-btn center" href="<?php echo e(route('quizz')); ?>">Start Quiz</a>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/home.blade.php ENDPATH**/ ?>
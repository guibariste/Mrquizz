<?php $__env->startSection('content'); ?>

<div class="mb4">
    <p class="center title"><?php echo e($questions->question ?? 0); ?></p>
  
</div>
<p> Date creation  du quizz : <?php echo e(session('quizName')); ?></p>
<div class="checkboxText">
Question <?php echo e(session('counter')); ?> of 10
</div>

<form action="<?php echo e(route('quizz')); ?>" method="post">
<div class="checkboxText">
  <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answerr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="checkbox" class="checkbox" name="selectedAnswers[]" value="<?php echo e($answerr->id); ?>">
    <span><?php echo e($answerr->answer); ?></span>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
    <button type="submit" class="center green-btn">Submit</button>
    <?php echo csrf_field(); ?>
   
  
  
 
</form>
<?php if(isset($erreur)): ?>
    <div class="erreurs"><?php echo e($erreur); ?></div>
<?php endif; ?>
<div class = "checkboxText">
<ul>
Categories utilises :
<?php $__currentLoopData = session('categUtilises', []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <li><?php echo e($categ); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/quizz.blade.php ENDPATH**/ ?>
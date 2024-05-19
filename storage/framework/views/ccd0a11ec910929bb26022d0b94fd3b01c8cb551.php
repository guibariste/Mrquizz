<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('storeQuizName')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="quizName">Nom du Quizz:</label>
        <textarea class="form-control" id="quizName" name="quizName" rows="1" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Continuer</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/quizz-name.blade.php ENDPATH**/ ?>
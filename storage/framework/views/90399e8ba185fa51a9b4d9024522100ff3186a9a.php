<?php $__env->startSection('content'); ?>

<a class="top-left-corner blue-btn" href="<?php echo e(route('profile')); ?>"> <?php echo e(auth()->user()->username); ?> </a>
Nom de votre quizz : <?php echo e(session('quizName')); ?>

<a class="top-right-corner blue-btn" href="<?php echo e(route('home')); ?>">
    Accueil</a>


<div>
                <p class="title">Votre score est de : </p>
                <p class="title" style="font-size:70px; font-style:bold;">
                <?php echo e($count ?? ''); ?> / <?php echo e($total ?? ''); ?> 
                </p>
            </div>
            <div class="results-wrapper">
                <div class="result">
                    <p>Art</p>
                    <p class="title"><?php echo e($countArtCorrect ?? ''); ?> / <?php echo e($countArtTotale ?? ''); ?> </p>
                </div>
                <div class="result">
                    <p>Geographie</p>
                    <p class="title"><?php echo e($countGeoCorrect ?? ''); ?> / <?php echo e($countGeoTotale ?? ''); ?> </p>
                </div>   
                <div class="result">
                    <p>Histoire</p>
                    <p class="title"><?php echo e($countHistCorrect ?? ''); ?> / <?php echo e($countHistTotale ?? ''); ?></p>
                </div>
                <div class="result">
                    <p>Science</p>
                    <p class="title"><?php echo e($countSciCorrect ?? ''); ?> / <?php echo e($countSciTotale ?? ''); ?></p>
                </div>
                <div class="result">
                    <p>Sport</p>
                    <p class="title"><?php echo e($countSpoCorrect ?? ''); ?> / <?php echo e($countSpoTotale ?? ''); ?></p>
                </div>
                
                
                
</div>
         
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/reponse.blade.php ENDPATH**/ ?>
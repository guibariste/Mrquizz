<?php $__env->startSection('content'); ?>

<a class="top-right-corner red-btn" href="<?php echo e(route('home')); ?>">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name"><?php echo e(auth()->user()->username); ?></p>
        <p class="title profile-email"><?php echo e(auth()->user()->email); ?></p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp"><?php echo e(auth()->user()->xp); ?> XP</p>

    </div>
</div>

<p class="title profile-xp">Recapitulatif des questions repondues correctement par categorie : </p><br>
<div class="profile-email">
Art : <?php echo e($countArtCorrect ?? ''); ?> / <?php echo e($countArtTotales ?? ''); ?> <?php echo e($pourcArt ?? ''); ?><br>
Geographie : <?php echo e($countGeoCorrect ?? ''); ?> / <?php echo e($countGeoTotales ?? ''); ?> <?php echo e($pourcGeo ?? ''); ?><br>
Histoire : <?php echo e($countHistCorrect ?? ''); ?> / <?php echo e($countHistTotales ?? ''); ?> <?php echo e($pourcHist ?? ''); ?><br>
Sciences : <?php echo e($countSciCorrect ?? ''); ?> / <?php echo e($countSciTotales ?? ''); ?> <?php echo e($pourcSci ?? ''); ?><br>
Sport : <?php echo e($countSpoCorrect ?? ''); ?> / <?php echo e($countSpoTotales ?? ''); ?> <?php echo e($pourcSpo ?? ''); ?><br>
total de tout : <?php echo e($countCorrect ?? ''); ?>/<?php echo e($countTotale ?? ''); ?> 
</div>
<br>
<p class="title profile-name">Rang : <?php echo e($rang ?? ''); ?></p>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/profile.blade.php ENDPATH**/ ?>
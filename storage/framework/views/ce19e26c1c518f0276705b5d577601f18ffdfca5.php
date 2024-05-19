<?php $__env->startSection('content'); ?>

<table class="users-table">
    <thead>
        <tr>
            <th>Username</th>
            <th>XP</th>
            <th>Ratio</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->username); ?></td>
                <td><?php echo e($user->xp); ?></td>
                <td><?php echo e($user->ratio); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<a class="bottom-right-corner red-btn"  href="<?php echo e(route('home')); ?>">< Back ></a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/guibar/Bureau/cursus/mrquizz/mister_quiz/resources/views/leaderboard.blade.php ENDPATH**/ ?>
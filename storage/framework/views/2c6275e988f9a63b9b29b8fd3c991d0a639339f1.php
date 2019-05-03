<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="login shadow">
        <div class="login-item1 xx-large white belizeholebg">

            <div class="login100-form-title" style="background-image: url(/img/login-cover.png);">
                <span class="login100-form-title-1">
                    Sign In
                </span>
            </div>
        </div>

        <div class="login-item2 whitebg">

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div id="email" class="input whitebg login-input-icon"> <span class="glyphicon glyphicon-envelope belizehole"></span><input class="login-input login-input-icon <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus type="text" placeholder="Email"></div>


                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <div id="password" class="input whitebg login-input-icon"> <span class="glyphicon glyphicon-lock belizehole"></span><input class="login-input <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required type="password" placeholder="Password"> </div>

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="login-button-panel clearfix">
                        <div class="col-xs-6">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            &nbsp; &nbsp;
                            <label class="form-check-label" for="remember">
                                <p class="small"><?php echo e(__('Remember Me')); ?></p>
                            </label>
                        </div>

                        <div class="col-xs-6 right">
                         <?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link small" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                        <?php endif; ?>
                        <br><br><br>
                        <button type="submit" class="btn btn-primary medium">
                            <?php echo e(__('Login')); ?>

                        </button>
                        </div>
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
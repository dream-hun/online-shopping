<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4 mt-4 mb-4" href="<?php echo e(route('admin.home')); ?>">
            <img src="<?php echo e(asset('images/logo.svg')); ?>">
        </a>
    </div>
    <ul class="c-sidebar-nav mt-5">
        <li class="c-sidebar-nav-item">
            <a href="<?php echo e(route('admin.home')); ?>" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                <?php echo e(trans('global.dashboard')); ?>

            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.categories.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/categories') || request()->is('admin/categories/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw fas fa-list-ol c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.category.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.products.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/products') || request()->is('admin/products/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw fas fa-luggage-cart c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.product.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.orders.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/orders') || request()->is('admin/orders/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.order.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.settings.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/settings') || request()->is('admin/settings/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.setting.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.events.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/events') || request()->is('admin/events/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw fas fa-location-arrow c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.event.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter_access')): ?>
            <li class="c-sidebar-nav-item">
                <a href="<?php echo e(route('admin.newsletters.index')); ?>"
                    class="c-sidebar-nav-link <?php echo e(request()->is('admin/newsletters') || request()->is('admin/newsletters/*') ? 'c-active' : ''); ?>">
                    <i class="fa-fw far fa-envelope c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.newsletter.title')); ?>

                </a>
            </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
            <li
                class="c-sidebar-nav-dropdown <?php echo e(request()->is('admin/permissions*') ? 'c-show' : ''); ?> <?php echo e(request()->is('admin/roles*') ? 'c-show' : ''); ?> <?php echo e(request()->is('admin/users*') ? 'c-show' : ''); ?>">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    <?php echo e(trans('cruds.userManagement.title')); ?>

                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(route('admin.permissions.index')); ?>"
                                class="c-sidebar-nav-link <?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : ''); ?>">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                <?php echo e(trans('cruds.permission.title')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(route('admin.roles.index')); ?>"
                                class="c-sidebar-nav-link <?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : ''); ?>">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                <?php echo e(trans('cruds.role.title')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                        <li class="c-sidebar-nav-item">
                            <a href="<?php echo e(route('admin.users.index')); ?>"
                                class="c-sidebar-nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : ''); ?>">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                <?php echo e(trans('cruds.user.title')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profile_password_edit')): ?>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link <?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : ''); ?>"
                        href="<?php echo e(route('profile.password.edit')); ?>">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        <?php echo e(trans('global.change_password')); ?>

                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                <?php echo e(trans('global.logout')); ?>

            </a>
        </li>
    </ul>

</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/partials/menu.blade.php ENDPATH**/ ?>
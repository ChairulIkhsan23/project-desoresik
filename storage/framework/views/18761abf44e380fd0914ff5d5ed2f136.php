<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['url']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['url']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<tr>
<td class="header" style="text-align: center;">
    <a href="<?php echo e($url); ?>" style="display: inline-block;">
        <img src="<?php echo e(asset('storage/email-assets/logo-desoresik.png')); ?>" alt="Logo Desoresik" style="height: 60px;">
    </a>
</td>
</tr>
<?php /**PATH C:\laragon\www\project-desoresik\resources\views/vendor/mail/html/header.blade.php ENDPATH**/ ?>
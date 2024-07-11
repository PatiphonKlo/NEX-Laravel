<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('enquiry.view')); ?>">
    <button class="bg-gray-400 uppercase text-white px-4 py-2 rounded-md font-semibold">
        Back
    </button>
</a>
<section class="block w-full p-2 bg-yellow-500 rounded-md mt-3 shadow-md">
    <h2 class="text-lg font-semibold uppercase text-center text-white">Enquiry Form Edit</h2>
</section>
<form method="POST" action="<?php echo e(config('app.env') == 'production' ? secure('admin/enquiry-update/' . $enquiryData['enquiry_id']) : url('admin/enquiry-update/' . $enquiryData['enquiry_id'])); ?>" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <section class="bg-gray-50 rounded-md mt-4 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Contact Information</h2>
            <p class="mt-1 text-gray-500 font-normal uppercase">Complete all field</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
            <div>
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'company','value' => 'Company Name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'company','value' => 'Company Name']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'company','type' => 'text','name' => 'company','value' => ''.e($enquiryData['client_data']['client_company'] ?? old('company')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'company','type' => 'text','name' => 'company','value' => ''.e($enquiryData['client_data']['client_company'] ?? old('company')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div>
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'contact_name','value' => 'Contactor Name']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'contact_name','value' => 'Contactor Name']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'contact_name','type' => 'text','name' => 'contact_name','value' => ''.e($enquiryData['client_data']['client_contact_name'] ?? old('contact_name')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'contact_name','type' => 'text','name' => 'contact_name','value' => ''.e($enquiryData['client_data']['client_contact_name'] ?? old('contact_name')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div>
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'email_address','value' => 'Contact Email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'email_address','value' => 'Contact Email']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'email_address','type' => 'text','name' => 'email_address','value' => ''.e($enquiryData['client_data']['client_email'] ?? old('email_address')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email_address','type' => 'text','name' => 'email_address','value' => ''.e($enquiryData['client_data']['client_email'] ?? old('email_address')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div>
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'phone','value' => 'Phone Number']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'phone','value' => 'Phone Number']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'phone','type' => 'text','name' => 'phone','value' => ''.e($enquiryData['client_data']['client_phone_number'] ?? old('phone')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'phone','type' => 'text','name' => 'phone','value' => ''.e($enquiryData['client_data']['client_phone_number'] ?? old('phone')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Mixing Tasks</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'chemical_substances','value' => 'Chemical Feed']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'chemical_substances','value' => 'Chemical Feed']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'chemical_substances','type' => 'text','name' => 'chemical_substances','value' => ''.e($enquiryData['chemical substances'] ?? old('chemical_substances')).'','placeholder' => 'test']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'chemical_substances','type' => 'text','name' => 'chemical_substances','value' => ''.e($enquiryData['chemical substances'] ?? old('chemical_substances')).'','placeholder' => 'test']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'water_base', 'value' => 'water base', 'label' => 'Water Base'],
                ['id' => 'oil_base', 'value' => 'oil base', 'label' => 'Oil Base'],
                ['id' => 'solvent_base', 'value' => 'solvent base', 'label' => 'Solvent Base'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'base_type','otherInputName' => 'base_type_other','options' => $options,'data' => $enquiryData['base type']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'base_type','otherInputName' => 'base_type_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['base type'])]); ?>
                    Base Type
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 grid grid-rows-2 gap-y-4">
                <div>
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'amount_of_liquid_liquid_type','value' => 'Amount of liquid-liquid type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'amount_of_liquid_liquid_type','value' => 'Amount of liquid-liquid type']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'amount_of_liquid_liquid_type','type' => 'number','name' => 'amount_of_liquid_liquid_type','value' => ''.e($enquiryData['liquid-liquid'] ?? old('amount_of_liquid_liquid_type')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'amount_of_liquid_liquid_type','type' => 'number','name' => 'amount_of_liquid_liquid_type','value' => ''.e($enquiryData['liquid-liquid'] ?? old('amount_of_liquid_liquid_type')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                </div>
                <div>
                    <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'amount_of_solid_liquid_type','value' => 'Amount of solid-liquid type']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'amount_of_solid_liquid_type','value' => 'Amount of solid-liquid type']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'amount_of_solid_liquid_type','type' => 'number','name' => 'amount_of_solid_liquid_type','value' => ''.e($enquiryData['solid-liquid'] ?? old('amount_of_solid_liquid_type')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'amount_of_solid_liquid_type','type' => 'number','name' => 'amount_of_solid_liquid_type','value' => ''.e($enquiryData['solid-liquid'] ?? old('amount_of_solid_liquid_type')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'miscible', 'value' => 'miscible', 'label' => 'Miscible'],
                ['id' => 'immiscible', 'value' => 'immiscible', 'label' => 'Immiscible'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'liquid_liquid_miscible','otherInputName' => 'liquid_liquid_miscible_other','options' => $options,'data' => $enquiryData['liquid-liquid miscible']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'liquid_liquid_miscible','otherInputName' => 'liquid_liquid_miscible_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['liquid-liquid miscible'])]); ?>
                    Liquid-liquid miscible
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'miscible', 'value' => 'miscible', 'label' => 'Miscible'],
                ['id' => 'immiscible', 'value' => 'immiscible', 'label' => 'Immiscible'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'solid_liquid_miscible','otherInputName' => 'solid_liquid_miscible_other','options' => $options,'data' => $enquiryData['solid-liquid miscible']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'solid_liquid_miscible','otherInputName' => 'solid_liquid_miscible_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['solid-liquid miscible'])]); ?>
                    Solid-liquid miscible
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'solid_particle','value' => 'Solid particle in process (%)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'solid_particle','value' => 'Solid particle in process (%)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'solid_particle','type' => 'number','name' => 'solid_particle','value' => ''.e($enquiryData['solid particle'] ?? old('solid_particle')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'solid_particle','type' => 'number','name' => 'solid_particle','value' => ''.e($enquiryData['solid particle'] ?? old('solid_particle')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'slurry_storage','value' => 'Slurry storage (%)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'slurry_storage','value' => 'Slurry storage (%)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'slurry_storage','type' => 'number','name' => 'slurry_storage','value' => ''.e($enquiryData['slurry storage'] ?? old('slurry_storage')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'slurry_storage','type' => 'number','name' => 'slurry_storage','value' => ''.e($enquiryData['slurry storage'] ?? old('slurry_storage')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'solid_liquid_dispersion','value' => 'Solid-liquid dispersion (%)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'solid_liquid_dispersion','value' => 'Solid-liquid dispersion (%)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'solid_liquid_dispersion','type' => 'number','name' => 'solid_liquid_dispersion','value' => ''.e($enquiryData['solid-liquid dispersion'] ?? old('solid_liquid_dispersion')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'solid_liquid_dispersion','type' => 'number','name' => 'solid_liquid_dispersion','value' => ''.e($enquiryData['solid-liquid dispersion'] ?? old('solid_liquid_dispersion')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'mixing_reaction','value' => 'Mixing reaction']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'mixing_reaction','value' => 'Mixing reaction']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'mixing_reaction','type' => 'text','name' => 'mixing_reaction','value' => ''.e($enquiryData['mixing reaction'] ?? old('mixing_reaction')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'mixing_reaction','type' => 'text','name' => 'mixing_reaction','value' => ''.e($enquiryData['mixing reaction'] ?? old('mixing_reaction')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'mixing_annotation','value' => 'Annotation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'mixing_annotation','value' => 'Annotation']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal750fbaa88753f84daf9adc418df98af0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal750fbaa88753f84daf9adc418df98af0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-area-input','data' => ['id' => 'mixing_annotation','name' => 'mixing_annotation','value' => ''.e($enquiryData['mixing annotation'] ?? old('mixing_annotation')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-area-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'mixing_annotation','name' => 'mixing_annotation','value' => ''.e($enquiryData['mixing annotation'] ?? old('mixing_annotation')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $attributes = $__attributesOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__attributesOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $component = $__componentOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__componentOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Liquid properties</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'max_viscosity','value' => 'Max viscosity']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'max_viscosity','value' => 'Max viscosity']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'max_viscosity','type' => 'number','name' => 'max_viscosity','value' => ''.e($enquiryData['max viscosity'] ?? old('max_viscosity')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'max_viscosity','type' => 'number','name' => 'max_viscosity','value' => ''.e($enquiryData['max viscosity'] ?? old('max_viscosity')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'max_density','value' => 'Max density']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'max_density','value' => 'Max density']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'max_density','type' => 'number','name' => 'max_density','value' => ''.e($enquiryData['max density'] ?? old('max_density')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'max_density','type' => 'number','name' => 'max_density','value' => ''.e($enquiryData['max density'] ?? old('max_density')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'heating_required', 'value' => 'heating required', 'label' => 'Heating required'],
                [
                'id' => 'no_heating_required',
                'value' => 'no heating required',
                'label' => 'No heating required',
                ],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'heating','otherInputName' => 'heating_other','options' => $options,'data' => $enquiryData['heating']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'heating','otherInputName' => 'heating_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['heating'])]); ?>
                    Heating
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'steam', 'value' => 'steam', 'label' => 'Steam'],
                ['id' => 'heater', 'value' => 'heater', 'label' => 'Heater'],
                ['id' => 'gas', 'value' => 'gas', 'label' => 'Gas'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'heater','otherInputName' => 'heater_other','options' => $options,'data' => $enquiryData['heater']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'heater','otherInputName' => 'heater_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['heater'])]); ?>
                    Heater
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'heating_temperature','value' => 'Heating Temperature (°C)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'heating_temperature','value' => 'Heating Temperature (°C)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'heating_temperature','type' => 'number','name' => 'heating_temperature','value' => ''.e($enquiryData['heating temperature'] ?? old('heating_temperature')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'heating_temperature','type' => 'number','name' => 'heating_temperature','value' => ''.e($enquiryData['heating temperature'] ?? old('heating_temperature')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'heating_pressure','value' => 'Heating Pressure (Bar)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'heating_pressure','value' => 'Heating Pressure (Bar)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'heating_pressure','type' => 'number','name' => 'heating_pressure','value' => ''.e($enquiryData['heating pressure'] ?? old('heating_pressure')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'heating_pressure','type' => 'number','name' => 'heating_pressure','value' => ''.e($enquiryData['heating pressure'] ?? old('heating_pressure')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'cooling_required', 'value' => 'cooling required', 'label' => 'Cooling required'],
                [
                'id' => 'no_cooling_required',
                'value' => 'no cooling required',
                'label' => 'No cooling required',
                ],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'cooling','otherInputName' => 'cooling_other','options' => $options,'data' => $enquiryData['cooling']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cooling','otherInputName' => 'cooling_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['cooling'])]); ?>
                    Cooling
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'water', 'value' => 'water', 'label' => 'Water'],
                ['id' => 'chiller', 'value' => 'chiller', 'label' => 'Chiller'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'cooler','otherInputName' => 'cooler_other','options' => $options,'data' => $enquiryData['cooler']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cooler','otherInputName' => 'cooler_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['cooler'])]); ?>
                    Cooler
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'cooling_temperature','value' => 'Cooling Temperature (°C)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'cooling_temperature','value' => 'Cooling Temperature (°C)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'cooling_temperature','type' => 'number','name' => 'cooling_temperature','value' => ''.e($enquiryData['cooling temperature'] ?? old('cooling_temperature')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cooling_temperature','type' => 'number','name' => 'cooling_temperature','value' => ''.e($enquiryData['cooling temperature'] ?? old('cooling_temperature')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'cooling_pressure','value' => 'Cooling Pressure (Bar)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'cooling_pressure','value' => 'Cooling Pressure (Bar)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'cooling_pressure','type' => 'number','name' => 'cooling_pressure','value' => ''.e($enquiryData['cooling pressure'] ?? old('cooling_pressure')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'cooling_pressure','type' => 'number','name' => 'cooling_pressure','value' => ''.e($enquiryData['cooling pressure'] ?? old('cooling_pressure')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'properties_annotation','value' => 'Annotation']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'properties_annotation','value' => 'Annotation']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal750fbaa88753f84daf9adc418df98af0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal750fbaa88753f84daf9adc418df98af0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-area-input','data' => ['id' => 'properties_annotation','name' => 'properties_annotation','value' => ''.e($enquiryData['properties annotation'] ?? old('properties_annotation')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-area-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'properties_annotation','name' => 'properties_annotation','value' => ''.e($enquiryData['properties annotation'] ?? old('properties_annotation')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $attributes = $__attributesOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__attributesOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $component = $__componentOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__componentOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">Vessel</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'SUS304', 'value' => 'SUS304', 'label' => 'SUS304'],
                ['id' => 'SUS316', 'value' => 'SUS316', 'label' => 'SUS316'],
                ['id' => 'steel', 'value' => 'steel', 'label' => 'steel'],
                ['id' => 'FRP_Coating', 'value' => 'FRP coating', 'label' => 'FRP Coating'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'material','otherInputName' => 'material_other','options' => $options,'data' => $enquiryData['material']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'material','otherInputName' => 'material_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['material'])]); ?>
                    Material
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'layer','value' => 'Number of Vessel\'s Layer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'layer','value' => 'Number of Vessel\'s Layer']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'layer','type' => 'number','name' => 'layer','value' => ''.e($enquiryData['layer'] ?? old('layer')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'layer','type' => 'number','name' => 'layer','value' => ''.e($enquiryData['layer'] ?? old('layer')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'first_layer_diameter','value' => 'Diameter (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'first_layer_diameter','value' => 'Diameter (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'first_layer','type' => 'number','name' => 'first_layer_diameter','value' => ''.e($enquiryData['first layer diameter'] ?? old('first_layer_diameter')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'first_layer','type' => 'number','name' => 'first_layer_diameter','value' => ''.e($enquiryData['first layer diameter'] ?? old('first_layer_diameter')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'first_layer_thickness','value' => 'Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'first_layer_thickness','value' => 'Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'first_layer','type' => 'number','name' => 'first_layer_thickness','value' => ''.e($enquiryData['first layer thickness'] ?? old('first_layer_thickness')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'first_layer','type' => 'number','name' => 'first_layer_thickness','value' => ''.e($enquiryData['first layer thickness'] ?? old('first_layer_thickness')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'first_layer_bottom','value' => 'Bottom Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'first_layer_bottom','value' => 'Bottom Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'first_layer','type' => 'number','name' => 'first_layer_bottom','value' => ''.e($enquiryData['first layer bottom'] ?? old('first_layer_bottom')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'first_layer','type' => 'number','name' => 'first_layer_bottom','value' => ''.e($enquiryData['first layer bottom'] ?? old('first_layer_bottom')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'first_layer_shell','value' => 'Shell Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'first_layer_shell','value' => 'Shell Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'first_layer','type' => 'number','name' => 'first_layer_shell','value' => ''.e($enquiryData['first layer shell'] ?? old('first_layer_shell')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'first_layer','type' => 'number','name' => 'first_layer_shell','value' => ''.e($enquiryData['first layer shell'] ?? old('first_layer_shell')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div id="second_layer" class="hidden col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'double_jacket', 'value' => 'double jacket', 'label' => 'Double Jacket'],
                ['id' => 'haft_coll', 'value' => 'haft coll', 'label' => 'Haft Coll'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'second_layer','otherInputName' => 'second_layer_other','options' => $options,'data' => $enquiryData['second layer']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'second_layer','otherInputName' => 'second_layer_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['second layer'])]); ?>
                    Second Layer Type
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div id="second_layer_thickness" class="hidden col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'second_layer_thickness','value' => 'Second Layer Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'second_layer_thickness','value' => 'Second Layer Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'second_layer_thickness','type' => 'number','name' => 'second_layer_thickness','value' => ''.e($enquiryData['second layer thickness'] ?? old('second_layer_thickness')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'second_layer_thickness','type' => 'number','name' => 'second_layer_thickness','value' => ''.e($enquiryData['second layer thickness'] ?? old('second_layer_thickness')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'rock_wool', 'value' => 'rock wool', 'label' => 'Rock wool'],
                ['id' => 'Pu_Foam', 'value' => 'PU foam', 'label' => 'PU foam'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'insulator','otherInputName' => 'insulator_other','options' => $options,'data' => $enquiryData['insulator']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'insulator','otherInputName' => 'insulator_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['insulator'])]); ?>
                    Insulator Type
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'insulator_thickness','value' => 'Insulator Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'insulator_thickness','value' => 'Insulator Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'insulator_thickness','type' => 'number','name' => 'insulator_thickness','value' => ''.e($enquiryData['insulator thickness'] ?? old('insulator_thickness')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'insulator_thickness','type' => 'number','name' => 'insulator_thickness','value' => ''.e($enquiryData['insulator thickness'] ?? old('insulator_thickness')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'flat', 'value' => 'flat head', 'label' => 'Flat Head'],
                ['id' => 'dish', 'value' => 'dish head', 'label' => 'Dish Head'],
                ['id' => 'cone', 'value' => 'cone head', 'label' => 'Cone Head'],
                ['id' => 'open', 'value' => 'open head', 'label' => 'Open Head'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'vessel_head','otherInputName' => 'vessel_head_other','options' => $options,'data' => $enquiryData['vessel head']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'vessel_head','otherInputName' => 'vessel_head_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['vessel head'])]); ?>
                    Head of Vessel
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'flat', 'value' => 'flat head', 'label' => 'Flat Head'],
                ['id' => 'dish', 'value' => 'dish head', 'label' => 'Dish Head'],
                ['id' => 'cone', 'value' => 'cone head', 'label' => 'Cone Head'],
                // ['id' => 'open', 'value' => 'open head', 'label' => 'Open Head'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'vessel_bottom','otherInputName' => 'vessel_bottom_other','options' => $options,'data' => $enquiryData['vessel bottom']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'vessel_bottom','otherInputName' => 'vessel_bottom_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['vessel bottom'])]); ?>
                    Buttom of Vessel
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'stainless', 'value' => 'stainless', 'label' => 'Stainless'],
                ['id' => 'aluminum', 'value' => 'aluminum', 'label' => 'Aluminum'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'overlay','otherInputName' => 'overlay_other','options' => $options,'data' => $enquiryData['overlay']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'overlay','otherInputName' => 'overlay_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['overlay'])]); ?>
                    Overlay of Vessel
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'overlay_thickness','value' => 'Overlay Thickness (mm)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'overlay_thickness','value' => 'Overlay Thickness (mm)']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input','data' => ['id' => 'overlay_thickness','type' => 'number','name' => 'overlay_thickness','value' => ''.e($enquiryData['overlay thickness'] ?? old('overlay_thickness')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'overlay_thickness','type' => 'number','name' => 'overlay_thickness','value' => ''.e($enquiryData['overlay thickness'] ?? old('overlay_thickness')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2">
                <?php if (isset($component)) { $__componentOriginald8ba2b4c22a13c55321e34443c386276 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald8ba2b4c22a13c55321e34443c386276 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.label','data' => ['for' => 'more_information','value' => 'More Information']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'more_information','value' => 'More Information']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $attributes = $__attributesOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__attributesOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ba2b4c22a13c55321e34443c386276)): ?>
<?php $component = $__componentOriginald8ba2b4c22a13c55321e34443c386276; ?>
<?php unset($__componentOriginald8ba2b4c22a13c55321e34443c386276); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal750fbaa88753f84daf9adc418df98af0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal750fbaa88753f84daf9adc418df98af0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-area-input','data' => ['id' => 'more_information','name' => 'more_information','value' => ''.e($enquiryData['more information'] ?? old('more_information')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-area-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'more_information','name' => 'more_information','value' => ''.e($enquiryData['more information'] ?? old('more_information')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $attributes = $__attributesOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__attributesOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal750fbaa88753f84daf9adc418df98af0)): ?>
<?php $component = $__componentOriginal750fbaa88753f84daf9adc418df98af0; ?>
<?php unset($__componentOriginal750fbaa88753f84daf9adc418df98af0); ?>
<?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 rounded-md mt-8 shadow-md">
        <div class="flex bg-gray-100 rounded-t-md py-2 px-6 shadow-sm">
            <h2 class="flex-1 text-base font-semibold uppercase">more important information</h2>
        </div>
        <div class="grid grid-cols-2 gap-4 p-6">
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'electric_motor', 'value' => 'electric motor', 'label' => 'Electric Motor'],
                ['id' => 'air_motor', 'value' => 'air motor', 'label' => 'Air Motor'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'motor_type','otherInputName' => 'motor_type_other','options' => $options,'data' => $enquiryData['motor type']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'motor_type','otherInputName' => 'motor_type_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['motor type'])]); ?>
                    Motor Type
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => '220V', 'value' => '220V', 'label' => '220V'],
                ['id' => '380V', 'value' => '380V', 'label' => '380V'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'power_system','otherInputName' => 'power_system_other','options' => $options,'data' => $enquiryData['power system']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'power_system','otherInputName' => 'power_system_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['power system'])]); ?>
                    Power System
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'fixed', 'value' => 'fixed', 'label' => 'Fixed'],
                ['id' => 'adjustable', 'value' => 'adjustable', 'label' => 'Adjustable'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'RPM','otherInputName' => 'RPM_other','options' => $options,'data' => $enquiryData['RPM']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'RPM','otherInputName' => 'RPM_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['RPM'])]); ?>
                    Revolution per Minute (RPM)
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'ABB', 'value' => 'ABB', 'label' => 'ABB'],
                ['id' => 'SIEMENS', 'value' => 'SIEMENS', 'label' => 'SIEMENS'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'motor_brand','otherInputName' => 'motor_brand_other','options' => $options,'data' => $enquiryData['motor brand']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'motor_brand','otherInputName' => 'motor_brand_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['motor brand'])]); ?>
                    Motor's Brand
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <?php
                $options = [
                ['id' => 'ABB', 'value' => 'ABB', 'label' => 'ABB'],
                ['id' => 'MITSUBISHI', 'value' => 'MITSUBISHI', 'label' => 'MITSUBISHI'],
                ['id' => 'others', 'value' => 'others', 'label' => 'Others'],
                ];
                ?>
                <?php if (isset($component)) { $__componentOriginalfc2728e57657781add6e91b83f7e5d34 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc2728e57657781add6e91b83f7e5d34 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.radio-input-edit','data' => ['name' => 'inverter_brand','otherInputName' => 'inverter_brand_other','options' => $options,'data' => $enquiryData['inverter brand']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('radio-input-edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'inverter_brand','otherInputName' => 'inverter_brand_other','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($options),'data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enquiryData['inverter brand'])]); ?>
                    Inverter's Brand
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $attributes = $__attributesOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__attributesOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc2728e57657781add6e91b83f7e5d34)): ?>
<?php $component = $__componentOriginalfc2728e57657781add6e91b83f7e5d34; ?>
<?php unset($__componentOriginalfc2728e57657781add6e91b83f7e5d34); ?>
<?php endif; ?>
            </div>
            <div class="col-span-2 md:col-span-1 bg-gray-50 shadow-sm rounded-md">
                <div class="pl-6 bg-white rounded-t-md py-2 mb-2 flex">
                    <label for="drawing_file">Drawing Flie</label>
                    <?php $__errorArgs = ['drawing_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span id="error-message" class="text-red-600 pl-2"><?php echo e($message); ?></span>
                    <svg class="w-4 h-4 text-red-700 mt-0.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                    </svg>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="my-2">
                    <div>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" id="have_drawing" name="drawing_file" value="yes" <?php echo e(old('drawing_file', $enquiryData['drawing file']) == 'yes' ? 'checked' : ''); ?> onclick="fileInput()" class="text-primary focus:ring-white">
                            <span class="ml-2">Have</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" id="no_drawing" name="drawing_file" value="no" <?php echo e(old('drawing_file', $enquiryData['drawing file']) == 'no' ? 'checked' : ''); ?> onclick="fileInput()" class="text-primary focus:ring-white">
                            <span class="ml-2">Don't have</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" id="otherCheck" name="drawing_file" value="others" <?php echo e(old('drawing_file', $enquiryData['drawing file']) == 'others' ? 'checked' : ''); ?> onclick="fileInput()" class="text-primary focus:ring-white">
                            <span class="ml-2">Others</span>
                        </label>
                    </div>
                </div>
                <div id="upload_drawing_file" onclick="fileInput()" class="hidden w-[90%] ml-6 mb-4 text-gray-600">
                    <input class="block w-full text-sm text-gray-500 border-none shadow-sm rounded-md bg-white focus:outline-none" aria-describedby="file_input_help" id="file_input" type="file" name="upload_drawing_file">
                    <p class="mt-1 text-sm text-gray-500" id="file_input_help">.pdf / .docs / .xlsx</p>
                    <?php $__errorArgs = ['upload_drawing_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span id="error-message" class="text-red-600"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
    </section>


    <div class="mt-4">
        <button id="clear-button" type="reset" class="w-20 py-2 text-white text-base bg-red-600 rounded-md hover:bg-red-500 focus:outline-none">Reset</button>
        <?php if (isset($component)) { $__componentOriginal13113c9f32f6116c43cb9fbecee94495 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13113c9f32f6116c43cb9fbecee94495 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>Submit <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $attributes = $__attributesOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $component = $__componentOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__componentOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
    </div>
    <script type="text/javascript">
        document.getElementById('clear-button').addEventListener('click', function() {
            // Select all radio input elements
            var radios = document.querySelectorAll('input[type="radio"]');
            // Iterate through each radio input and remove the 'checked' attribute
            radios.forEach(function(radio) {
                radio.removeAttribute('checked');
            });
            return false; // Prevent default action (useful if the button is inside a form)
        });

    </script>
    <script>
        function toggleForms() {
            var layerNumber = parseInt(document.getElementById('layer').value, 10);
            var secondForm = document.getElementById('second_layer');
            var thirdForm = document.getElementById('second_layer_thickness');

            // If the layer number is 2 or more, remove the 'hidden' class to display both forms
            if (layerNumber >= 2) {
                secondForm.classList.remove('hidden');
                thirdForm.classList.remove('hidden');
            } else {
                // If the layer number is less than 2, add the 'hidden' class to hide both forms
                secondForm.classList.add('hidden');
                thirdForm.classList.add('hidden');
            }
        }

        // Call toggleForms on input change
        document.getElementById('layer').addEventListener('input', toggleForms);

        // Call toggleForms on page load to check the initial value
        window.addEventListener('load', toggleForms);

    </script>
    <script>
        function fileInput() {
            if (document.getElementById('otherCheck').checked) {
                document.getElementById('upload_drawing_file').style.display = 'block';
            } else if (document.getElementById('have_drawing').checked) {
                document.getElementById('upload_drawing_file').style.display = 'block';
            } else if (document.getElementById('no_drawing').checked) {
                document.getElementById('upload_drawing_file').style.display = 'none';
            }
        }
        window.addEventListener('load', fileInput);

    </script>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/admin', ['title' => 'Enquiry Form'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\NEX\miscibles-platform-2.1\src\resources\views/pages/admin/enquiry/edit.blade.php ENDPATH**/ ?>
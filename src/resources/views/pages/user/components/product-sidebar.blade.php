<!-- Accordion start -->
<ul class="accordion w-full">
    @forelse ($groupedModel as $group => $models)
    <li class="cursor-pointer flex flex-col w-full text-xs sm:text-sm transition duration-300 group hover:bg-gray-200 rounded-sm">
        <div class="flex">
            <span class="flex-1 ml-1 text-left p-1">{{ $group }}</span>
            <svg class="w-2.5 h-2.5 sm:h-3 sm:w-3 m-2 transform transition duration-300 group-open:-rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
        </div>

        <ul class="hidden group-open">
            @forelse($models as $model => $value)
            <a href="javascript:void(0)" onclick="showImage('{{ isset($value['image_url']) ? $value['image_url'] : '' }}','{{ $model }}','{{ $group }}')" class="flex w-full text-tertiary transition duration-300 pl-3 group hover:bg-gray-100 text-left p-1 text-xs">
                {{ $model }}
            </a>
            @empty
            <ol class="flex items-center w-full text-base text-left pl-5 text-danger-normal">Not Avalible</ol>
            @endforelse
        </ul>
    </li>
    @empty
    <div class="flex justify-center">
        <span>Product not available.</span>
    </div>
    @endforelse
</ul>
<!-- Accordion end -->

<script>
    const accordionItems = document.querySelectorAll('.accordion li');

    accordionItems.forEach(item => {
        item.addEventListener('click', () => {
            const content = item.querySelector('ul');
            const arrow = item.querySelector('svg');

            content.classList.toggle('hidden');
            arrow.classList.toggle('-rotate-180');
        });
    });

    function showImage(imageUrl, currentModel, currentGroup) {

        const imageElement = document.getElementById('model-image');
        imageElement.src = imageUrl;

        const headerElement = document.getElementById('header-element');
        headerElement.innerText = currentModel;
        headerElement.classList.add('bg-primary');

        const navList = document.getElementById('nav-list');
        const linkElements = navList.getElementsByTagName('a'); 
        const relevantLinks = Array.from(linkElements).filter(link => link.id.startsWith('linkElement')); 

        relevantLinks.forEach(link => {
            const url = link.dataset.url;

            if (url && currentGroup && currentModel) {
                link.href = `${url}/${currentGroup}/${currentModel}`;
            } else {
                console.error('Link element missing required data-url attribute or currentGroup/currentModel parameters are undefined.');
            }
        });


        showImageCalled = true;
    }

</script>

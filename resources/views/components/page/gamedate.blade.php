<div class="flex flex-row items-end justify-center my-9">
    <p class="text-[3rem] text-white font-normal mr-3 leading-none">
        {{ date('d', strtotime($game->playtime)) }}
    </p>
    <p class="text-[1.4rem] text-white font-light leading-8">
        {{ date('M', strtotime($game->playtime)) }}
    </p>
</div>
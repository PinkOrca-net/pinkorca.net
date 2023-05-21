<!-- Anonymous message -->
<section id="anonymousMessage" class="flex flex-col items-center justify-between py-4 gap-y-3 sm:px-4">
    <div class="flex flex-col items-center text-[#f4abc4] text-bold">
        <h4 class="text-2xl">
        بدون تعارف با <b>پینک اورکا</b>
        </h4>
        <h6 id="response">
        حرفت رو بهم ناشناس بگو
        </h6>
    </div>
    <form method="post" name="sendMsg">
        <label class="flex items-center gap-x-2">
            <input id="aMsg" type="text" name="msg" class="flex max-w-sm px-4 py-2 rounded-full text-slate-800 focus:outline-none md:w-96" placeholder="راحت باش خودمونیم :)">
            <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
            <button type="submit" class="px-4 py-2 text-gray-800 transition-all duration-300 transform bg-pink-200 rounded-full hover:bg-pink-300 hover:scale-105">ارسال</button>
        </label>
    </form>
</section>
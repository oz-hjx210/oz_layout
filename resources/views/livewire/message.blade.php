<div>
    <!--Contact-->    
    <div class="flex flex-col lg:flex-row">
        <aside class="w-full lg:w-2/5 lg:pl-10 order-2">
            <div>
                <h2 class="text-3xl font-extrabold mb-6">親愛的顧客</h2>
                <p class="mb-6 text-gray-600 text-sm">我們將於收到您寶貴意見後的3個工作日內回覆。若您有限時性的需求，敬請電洽<a href="tel:"></a>，我們將竭誠為您服務，謝謝！</p>
                <p class="mb-6 text-red-600 text-sm">（固定假日無法即時回覆，敬請諒解）</p>
                <ul class="list-none my-6">
                    <li class=""><a  href="tel:{{ config('web.config_tel') }}" class="block leading-loose text-sm text-gray-900 hover:text-yellow-600"><i class="text-gray-400 fas fa-phone mr-3"></i>電話: {{ config('web.config_tel') }}</a></li>
                    <li><p class="block leading-loose text-sm text-gray-900 hover:text-yellow-600"><i class="text-gray-400 fas fa-fax mr-3"></i>傳真: {{ config('web.config_fax') }}</p></li>
                    <li><a  href="mailto:{{ config('web.config_email') }}" class="block leading-loose text-sm text-gray-900 hover:text-yellow-600"><i class="text-gray-400 fas fa-envelope mr-3"></i>信箱: {{ config('web.config_email') }}</a></li>
                    <li><p class="block leading-loose text-sm text-gray-900 hover:text-yellow-600"><i class="text-gray-400 fas fa-map-marker mr-3"></i>{{ config('web.config_address') }}</p></li>
                </ul>
            </div>
            <div class="inset-0 max-h-96 md:h-64">
                <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.533754615572!2d121.30508151474596!3d24.981972983996815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681f1fc1a1a51d%3A0x50e12aa85825912a!2z57ay6aCB6Kit6KiIV2ViIERlc2lnbiDlhYPkvLjnp5HmioA!5e0!3m2!1szh-TW!2stw!4v1539073058119"></iframe>
            </div>
        </aside>
        @if (session()->has('message'))
            <script>
                alert(" {{ session()->get('message') }}");

            </script>


        @endif
        <form class="block w-full lg:w-3/5" wire:submit.prevent="createMessage">
            {{csrf_field()}}
            <h2 class="text-3xl font-extrabold mb-6">聯絡我們</h2>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">姓名</label>
                    <input type="text" id="name"  wire:model.lazy="name" class=" @error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  required >
                    @error('name')
                    <ul class="text-red-600">
                        <li>{{ $message }}</li>
                    </ul>
                    @enderror
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">公司名稱</label>
                    <input type="text" id="company"  wire:model.lazy="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">聯絡電話</label>
                    <input type="tel" id="tel"  wire:model.lazy="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{9-11}" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">電子信箱</label>
                    <input type="mail" id="email"  wire:model.lazy="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                </div>
            </div>
            <!--
            <div class="mb-6">
                <select id="subject"  wire:model.lazy="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                    <option value="">請選擇諮詢項目</option>
                    <option value="售前咨詢">售前咨詢</option>
                    <option value="售後咨詢">售後咨詢</option>
                </select>
            </div>
            -->
            <div class="mb-6">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">內容</label>
                <textarea id="content"  wire:model.lazy="content" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required ></textarea>
                @error('content')
                <ul class="text-red-600">
                    <li>{{ $message }}</li>
                </ul>
                @enderror
            </div>
            <div class="grid gap-6 mb-6 lg:grid-cols-2">
                <div>
                    <div class="flex flex-row items-center">
                        <input type="text" id="captcha"  wire:model.lazy="captcha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="驗證碼" required>
                        <a href="javascript:re_captcha();" class="block ml-4 p-1 rounded border border-b-gray-400"><img src="{{URL('/captcha') }}" class="w-35 h-auto" id="codeimg"></a>

                    </div>
                    @error('captcha')
                    <ul class="text-red-600">
                        <li>{{ $message }}</li>
                    </ul>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center">送出</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        // 点击更换验证码
        function re_captcha() {
            $url = "{{ URL('captcha') }}";
            $url = $url + "?a=" + Math.random();
            document.getElementById('codeimg').src = $url;
            // $('#codeimg').attr('src',$url);
        }
    </script>

</div>

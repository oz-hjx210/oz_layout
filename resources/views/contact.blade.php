@extends('layouts.app')
@include('header')
    @section('content')
        <section class="page-banner bg-cover bg-center bg-black" style="background-image: url('img/slider-3.jpg');">
            <div class="inner py-16 flex flex-col justity-center bg-black/60 text-center text-white">
                <div class="banner-heading">
                    <h1 class="text-5xl font-bold">聯絡我們</h1>
                </div>
                <div class="breadcrumb mt-6 text-sm text-white/60">
                    <a href="/">首頁</a>
                    <span class="mx-2"><i class="fas fa-angle-right"></i></span>
                    <a href="#">聯絡我們</a>
                </div>
            </div>
        </section>

        <!--Contact-->
        <section class="mx-auto">
            <div class="container max-w-7xl mx-auto mt-3 mb-6 px-4 py-4 md:px-16 md:py-16 bg-white">
                <div class="flex flex-col lg:flex-row">
                    <aside class="w-full lg:w-2/5 lg:pl-10 order-2">
                        <div>
                            <h2 class="text-3xl font-extrabold mb-6">親愛的顧客</h2>
                            <p class="mb-6 text-gray-600 text-sm">我們將於收到您寶貴意見後的3個工作日內回覆。若您有限時性的需求，敬請電洽<a href="tel:"></a>，我們將竭誠為您服務，謝謝！</p>
                            <p class="mb-6 text-red-600 text-sm">（固定假日無法即時回覆，敬請諒解）</p>
                            <ul class="list-none my-6">
                                <li class=""><a class="block leading-loose text-sm text-gray-900 hover:text-indigo-600"><i class="text-gray-400 fas fa-phone mr-3"></i>電話: +886-3-366-1000</a></li>
                                <li><a class="block leading-loose text-sm text-gray-900 hover:text-indigo-600"><i class="text-gray-400 fas fa-fax mr-3"></i>傳真: +886-3-366-9292</a></li>
                                <li><a class="block leading-loose text-sm text-gray-900 hover:text-indigo-600"><i class="text-gray-400 fas fa-envelope mr-3"></i>信箱: services@ozchamp.net</a></li>
                                <li><a class="block leading-loose text-sm text-gray-900 hover:text-indigo-600"><i class="text-gray-400 fas fa-map-marker mr-3"></i>台灣330桃園市介壽路288號7F</a></li>
                            </ul>
                        </div>
                        <div class="inset-0 max-h-96 md:h-64">
                            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.533754615572!2d121.30508151474596!3d24.981972983996815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681f1fc1a1a51d%3A0x50e12aa85825912a!2z57ay6aCB6Kit6KiIV2ViIERlc2lnbiDlhYPkvLjnp5HmioA!5e0!3m2!1szh-TW!2stw!4v1539073058119"></iframe>
                        </div>
                    </aside>
                    <form class="block w-full lg:w-3/5" method="post" action="{{url('/contact_post')}}">
                        {{csrf_field()}}
                        <h2 class="text-3xl font-extrabold mb-6">我要諮詢</h2>
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">姓名</label>
                                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                            <div>
                                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">公司名稱</label>
                                <input type="text" id="company" name="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">聯絡電話</label>
                                <input type="tel" id="phone" name="tel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{9-11}" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">電子信箱</label>
                                <input type="mail" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                            </div>
                        </div>
                        <div class="mb-6">
                            <select id="options" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
                                <option>請選擇諮詢項目</option>
                                <option value="售前咨詢">售前咨詢</option>
                                <option value="售後咨詢">售後咨詢</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">內容</label>
                            <textarea id="content" name="content" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                        </div>
                        <div class="grid gap-6 mb-6 lg:grid-cols-2">
                            <div>
                                <div class="flex flex-row items-center">
                                    <input type="text" id="capatcha" name="capatcha" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="驗證碼" required>
                                    <a href="javascript:re_captcha();" class="block ml-4 p-1 rounded border border-b-gray-400"><img src="{{URL('/captcha') }}" class="w-35 h-auto" id="codeimg"></a>
                                    @error('capatcha')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center">送出</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            // 点击更换验证码
            function re_captcha() {
                $url = "{{ URL('captcha') }}";
                $url = $url + "?a=" + Math.random();
                document.getElementById('codeimg').src = $url;
                // $('#codeimg').attr('src',$url);
            }
        </script>
    @endsection
@include('footer')




<div>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Tailwind CSS Accordion</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <style>
            /* Tab content - closed */
            .tab-content {
                max-height: 0;
                -webkit-transition: max-height .35s;
                -o-transition: max-height .35s;
                transition: max-height .35s;
            }
            /* :checked - resize to full height */
            .tab input:checked ~ .tab-content {
                max-height: 100vh;
            }
            /* Label formatting when open */
            .tab input:checked + label{
                /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
                font-size: 1.25rem; /*.text-xl*/
                padding: 1.25rem; /*.p-5*/
                border-left-width: 2px; /*.border-l-2*/
                border-color: #6574cd; /*.border-indigo*/
                background-color: #f8fafc; /*.bg-gray-100 */
                color: #6574cd; /*.text-indigo*/
            }
            /* Icon */
            .tab label::after {
                float:right;
                right: 0;
                top: 0;
                display: block;
                width: 1.5em;
                height: 1.5em;
                line-height: 1.5;
                font-size: 1.25rem;
                text-align: center;
                -webkit-transition: all .35s;
                -o-transition: all .35s;
                transition: all .35s;
            }
            /* Icon formatting - closed */
            .tab input[type=checkbox] + label::after {
                content: "+";
                font-weight:bold; /*.font-bold*/
                border-width: 1px; /*.border*/
                border-radius: 9999px; /*.rounded-full */
                border-color: #b8c2cc; /*.border-grey*/
            }
            .tab input[type=radio] + label::after {
                content: "\25BE";
                font-weight:bold; /*.font-bold*/
                border-width: 1px; /*.border*/
                border-radius: 9999px; /*.rounded-full */
                border-color: #b8c2cc; /*.border-grey*/
            }
            /* Icon formatting - open */
            .tab input[type=checkbox]:checked + label::after {
                transform: rotate(315deg);
                background-color: #6574cd; /*.bg-indigo*/
                color: #f8fafc; /*.text-grey-lightest*/
            }
            .tab input[type=radio]:checked + label::after {
                transform: rotateX(180deg);
                background-color: #6574cd; /*.bg-indigo*/
                color: #f8fafc; /*.text-grey-lightest*/
            }
        </style>
    </head>
    <body class="font-sans container">
    <div class="w-full md:w-5/5 mx-auto p-8">
        <div class="shadow-md">
            @foreach ($categories as $category)
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="{{$category['id']}}" type="radio" name="tabs2">
                    <label class="block p-5 leading-normal cursor-pointer" for="{{$category['id']}}">{{$category['name']}}</label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <div class="w-75 h-75 md:w-85 md:h-auto md:rounded-none rounded-full mx-auto">
                            <p class="text-gray-800 md:font-sans text-3xl text-center gap-8">{{$category['name']}}</p>
                        </div>
                        <article class="p-4 flex space-x-4">
                            <img src="{{asset('storage/img/'.$category['img'])}}" alt="" class="flex-none w-18 h-18 rounded-lg object-cover" width="144" height="144" />
                            <div class="min-w-0 relative flex-auto sm:pr-20 lg:pr-0 xl:pr-20">
                                <h2 class="text-lg font-semibold text-black mb-0.5">
                                    {{ $category['name'] }}
                                </h2>
                                <dl class="flex flex-wrap text-sm font-medium whitespace-pre">
                                    <div>
                                        <dt class="sr-only">Time</dt>
                                        <dd>
                                            <abbr title="{{ $category['name'] }} minutes">{{ $category['name'] }}m</abbr>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="sr-only">Difficulty</dt>
                                        <dd> · {{ $category['name'] }}</dd>
                                    </div>
                                    <div>
                                        <dt class="sr-only">Servings</dt>
                                        <dd> · {{ $category['name'] }} servings</dd>
                                    </div>
                                    <div class="flex-none w-full mt-0.5 font-normal">
                                        <dt class="inline">By</dt>
                                        <dd class="inline text-black">{{ $category['name'] }}</dd>
                                    </div>
                                    <div class="absolute top-0 right-0 rounded-full bg-amber-50 text-amber-900 px-2 py-0.5 hidden sm:flex lg:hidden xl:flex items-center space-x-1">
                                        <dt class="text-amber-500">
                                            <span class="sr-only">Rating</span>
                                            <svg width="16" height="20" fill="currentColor">
                                                <path d="M7.05 3.691c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.372 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.539 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118L.98 9.483c-.784-.57-.381-1.81.587-1.81H5.03a1 1 0 00.95-.69L7.05 3.69z" />
                                            </svg>
                                        </dt>
                                        <dd>{{ $category['name'] }}</dd>
                                    </div>
                                </dl>
                            </div>
                        </article>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </body>

    <script>
        /* Optional Javascript to close the radio button version by clicking it again */
        var myRadios = document.getElementsByName('tabs2');
        var setCheck;
        var x = 0;
        for(x = 0; x < myRadios.length; x++){
            myRadios[x].onclick = function(){
                if(setCheck != this){
                    setCheck = this;
                }else{
                    this.checked = false;
                    setCheck = null;
                }
            };
        }
    </script>
    </html>
</div>

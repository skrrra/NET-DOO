@props([
    'items',
    'oldValues' => null,
    'text' => 'Name here',
    'name' => ''
])

<div>
    <label for="select" class="text-sm font-semibold">{{ $text }} <span class="text-blue-600 dark:text-blue-300">*</span></label>
    <select x-cloak id="select">
        @foreach ($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>

<div x-data="dropdown({{ $oldValues }})" x-init="loadOptions()" class="w-full flex flex-col">
    <input name="{{ $name }}" type="hidden" x-bind:value="selectedValues()">

    <div>
      <div class="flex flex-col relative">
        <div x-on:click="open" class="w-full mt-2">
          <div class="flex border border-gray-300 bg-gray-50 dark:bg-gray-800 dark:border-gray-700 rounded-md">
            <input x-model="search" x-on:keyup="searchCategories()" x-on:keydown="open" type="search" class="cursor-pointer border-gray-300 w-full rounded-l-md bg-gray-50 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-blue-300" placeholder="Izaberi kategorije">

            <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 dark:bg-gray-800 dark:border-gray-700 svelte-1l8159u">
  
              <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                <svg class="fill-current dark:text-blue-300 h-4 w-4" viewBox="0 0 20 20">
                  <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25L17.418,6.109z"/>
                </svg>
              </button>

              <button type="button" x-show="isOpen() === false" x-on:click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
            </div>
          </div>

          @error($name)
            <div>
              <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            </div>
          @enderror

          <div class="flex flex-auto flex-wrap">

            <template x-for="(option,index) in selected" :key="options[option].value">
              <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white dark:text-blue-300 dark:bg-gray-700 dark:border-blue-300 rounded-md border border-gray-300 shadow-sm dark:hover:bg-gray-800">
                <div class="text-xs font-normal leading-none max-w-full flex-initial x-model=" options[option] x-text="options[option].text"></div>
                <div class="flex flex-auto flex-row-reverse ml-1">
                  <div x-on:click.stop="remove(index,option)">
                    <svg class="fill-current dark:text-blue-300 h-4 w-4 " role="button" viewBox="0 0 20 20">
                      <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15C14.817,13.62,14.817,14.38,14.348,14.849z"/>
                    </svg>
                  </div>
                </div>
              </div>
            </template>
          </div>

        </div>
        <div class="w-full px-4">
          <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white dark:bg-gray-800 dark:border-gray-700 z-40 w-full left-0 rounded max-h-select" x-on:click.away="close">
            <div class="flex flex-col w-full overflow-y-auto h-64">
              <div x-show="selected.length == 0" class="flex-1 hidden">
                <input class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()" disabled>
              </div>
              <template x-for="(option,index) in searchCategories()" :key="option" class="overflow-auto">
                <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100 dark:bg-gray-700 dark:border-gray-700 dark:hover:bg-gray-800" @click="select(index,$event,option)">
                  <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                    <div class="w-full items-center flex justify-between dak:text-blue-300">
                      <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                      <div x-show="option.selected">
                        <svg class="svg-icon fill-current dark:text-blue-300" viewBox="0 0 20 20">
                          <path class="fill-current stroke-current dark:text-blue-300" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                              C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                              L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>

    function dropdown(oldValues) {

    return {
        search: '',
        oldValues,
        options: [],
        selected: [],
        show: false,
        open() { this.show = true },
        close() { this.show = false },
        isOpen() { return this.show === true },
        select(index, event, option) {

          if(this.search != ''){
            index = this.options.indexOf(option);
            if(!this.options[option.index].selected){
              this.options[option.index].selected = true;
              this.options[option.index].element = event.target;
              this.selected.push(option.index);
            }else{
              this.selected.splice(this.selected.lastIndexOf(option.index), 1);
              this.options[option.index].selected = false
            }
          }else{
            if (!this.options[index].selected) {
                this.options[index].selected = true;
                this.options[index].element = event.target;
                this.selected.push(index);
            } else {
                this.selected.splice(this.selected.lastIndexOf(index), 1);
                this.options[index].selected = false
            }
          }
        },
        remove(index, option) {
            this.options[option].selected = false;
            this.selected.splice(index, 1);
        },
        loadOptions() {
            const options = document.getElementById('select').options;
            for (let i = 0; i < options.length; i++) {
                this.options.push({
                    value: options[i].value,
                    text: options[i].innerText,
                    selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                });
            }

            /*
              This array map is used to select all old values that  were passed from the request old('categories')
            */
            if(oldValues != null){
              this.options.map((element) => {
              if(this.oldValues.includes(parseInt(element.value))){
                this.select(this.options.indexOf(element), this.options[this.options.indexOf(element)].selected);
                }
              });
            }
        },
        selectedValues(){
            return this.selected.map((option)=>{
                return this.options[option].value;
            })
        },
        searchCategories(){
          if(this.search == ''){
            return this.options;
          }

          return filteredSearch = this.options.filter(element => {
            if(element.text.toLowerCase().includes(this.search.toLocaleLowerCase())){
              element.index = this.options.indexOf(element);
              return element;
            }

            return;
          });
        }
    }
}
</script>
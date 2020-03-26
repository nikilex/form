<template>
  <div class="container back p-5">
    <div class="row delo">
      <div class="col">
        <div class="row justify-content-start " v-for="profile in profiles">   
          <div class="col-3 d-none d-md-block item">{{profile.item}}</div> 
          <div class="col-12 col-md-9 border-bottom profile" >{{profile.value}}</div>  
        </div>
      </div>
    </div>
    <div class="row mt-5 ">
      <div class="col">
        <p class="item">Расскажите о cебе чекбоксами</p>
        <p class="text-justify text">Отметьте чекбоксами пункты, которые соответствуют вашим скиллам. 
          Отсутствие опыта не означает, что у вас меньше шансов стать одним из наших товарищей. 
          Это означает, что вы будете получать те задачи, с которыми гарантировано будете справляться.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-4 p-0 p-sm-2" v-for="check in checkbox">
          <input type="checkbox" class="" :id="check.id" v-model="check.checked">
          <label class="label-checkbox"  :for="check.id">{{check.name}}</label>
      </div>
    </div>
    <div class="row mt-5 mb-5">
      <div class="col">
        <p class="item">Уровень владения JavaScript</p>
        <div class="flex mt-5">
          <vue-slider class="d-block d-lg-block "
            v-model="value"           
            :marks="marks1"
            :tooltip="'always'"
            :included="true"
            :use-keyboard="true"
            >
            <template v-slot:tooltip="{ value }">
              <div class=custom-tooltip></div>
            </template>      
          </vue-slider>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="row justify-content-start mt-10 mt-lg-5 pb-5">   
      <div class="col-5 col-md-5 col-lg-4 col-xl-3 item">Дата заполнения</div> 
      <div class="col-7 col-md-5 col-lg-4 col-xl-3 border-bottom profile">26.03.2020</div>  
    </div>
  </div>
</template>
<style>
.vue-slider-mark-label {
    white-space: normal!important;
    text-align: center;
}

.vue-slider-process {
    opacity: 0!important;
}

.vue-slider-dot-handle {
    opacity: 0;
}

.custom-tooltip {
    width: 17px;
    height: 14px;
    background: url('/img/tooltip.png');
}

.vue-slider-rail {
    background-color: #4c204e;
}

.vue-slider-dot-tooltip-top {
    top: 0;
}

.vue-slider-ltr .vue-slider-mark-label,
.vue-slider-rtl .vue-slider-mark-label {
    margin-left: 100px;
    text-align: left;
    margin-top: 30px;
    font-family: "PTSans Bold", sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
}

.vue-slider-mark:last-child .vue-slider-mark-label {
    margin-left: -83px;
    text-align: left;
    margin-top: 30px;
}

.vue-slider-mark:first-child .vue-slider-mark-step,
.vue-slider-mark:last-child .vue-slider-mark-step {
    display: block;
    position: relative;
    width: 3px;
    background-color: #4c204e;
    height: 30px;
    cursor: pointer;
    border-radius: 0;
}

.vue-slider-mark-step {
    position: relative;
    width: 3px;
    background-color: #4c204e;
    height: 15px;
    cursor: pointer;
    border-radius: 0;
}

@media (min-width: 1005px) {
    .vue-slider-ltr .vue-slider-mark-label,
    .vue-slider-rtl .vue-slider-mark-label {
        width: 200px;
    }
}

@media (max-width: 1005px) {
    .vue-slider-ltr .vue-slider-mark-label,
    .vue-slider-rtl .vue-slider-mark-label {
        margin-left: 25px;
        text-align: left;
        margin-top: 30px;
    }
    .vue-slider-mark:last-child .vue-slider-mark-label {
        margin-left: -30px;
        text-align: left;
        margin-top: 30px;
    }
}
</style>
<script>
export default {
    data() {
        return {
            imgUrl: '/img/dot.svg',
            rangeValue: {},
            marks1: {
              '0': 'Не владею',
              '20': 'Использую готовые решения',
              '50': 'Использую готовые решения \n и умею их использовать',
              '100': 'Пишу сложный JS с нуля',
            },
            value: '50',
            checkbox: [
              {id:'html', name: 'HTML', checked: true},
              {id: 'css', name: 'CSS', checked: true},
              {id: 'scss', name: 'SCSS (SASS)', checked: false},
              {id: 'bem', name: 'БЭМ', checked: true},
              {id: 'jquery', name: 'JQuery', checked: true},
              {id: 'vue', name: 'Vue.js', checked: true},
              {id: 'nuxt', name: 'Nuxt.js', checked: false},
              {id: 'git', name: 'Git', checked: true},
              {id: 'adapt', name: 'Адаптивная вёрстка', checked: true},
              {id: 'mail', name: 'Верстка писем', checked: true},
              {id: 'php', name: 'PHP', checked: true},
              {id: 'mysql', name: 'MySQL', checked: true},
              ],
            profiles:[
              {item: "Полное ФИО", value: "Никитин Алексей Леонидович"},
              {item: "Год рождения", value: "1991"},
              {item: "Место жительства", value: "г. Карпинск"},
              {item: "Скайп", value: "alex_mobi@mail.ru"},
              {item: "Почта", value: "alex_mobi@mail.ru"},
              ]
        };
    },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
      callbackRange (val) {
              this.rangeValue = val
            }
      },
};
</script>

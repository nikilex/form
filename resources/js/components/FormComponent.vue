<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        
          <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" v-model="name" name="name" placeholder="Введите имя" />
          </div>
          <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" id="phone" v-model="phone" name="phone" placeholder="Введите телефон" />
          </div>
          <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" id="message" v-model="message" name="message"  placeholder="Введите сообщение" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="sendTo">Оправить</label>
            <select class="form-control" id="sendTo" v-model="sendTo" name="sendTo">
            <option value="0">На E-mail</option>
            <option value="1">В тестовый файл</option>
            <option value="2">В MySQL</option>
            </select>
        </div>
          <div v-if="sendTo == 0" class="form-group">
            <label for="email">Ваш E-mail</label>
            <input type="email" class="form-control" id="email" name="email" v-model="email" >
          </div>
          <div class="form-group">
            <button type="submit" @click="send" class="btn btn-outline-success">Отправить</button>
          </div>
        
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            phone: '',
            message: '',
            email:'',
            sendTo: 0,
            
        };
    },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
      send(){
          axios
          .post('/send',{
              name: this.name,
              phone: this.phone,
              message: this.message,
              email: this.email,
              sendTo: this.sendTo,
          })
          .then( response => {
              console.log(response.data);
          })
      },
  },
};
</script>

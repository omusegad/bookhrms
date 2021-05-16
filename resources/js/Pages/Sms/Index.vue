<template>
  <layout>
        <div class="row">
            <form @submit.prevent="submit">
            <label for="first_name">First name:</label>
            <input id="first_name" v-model="form.first_name" />
            <label for="last_name">Last name:</label>
            <input id="last_name" v-model="form.last_name" />
            <label for="email">Email:</label>
            <textarea name="smsText" id="" cols="30" rows="5"></textarea>
            <button type="submit">Submit</button>
        </form>
      </div>
   </layout>
</template>

<script>
import Layout from '../Layout'


export default {
    props: ['foo'],
    components: {
      Layout
    },
}
</script>



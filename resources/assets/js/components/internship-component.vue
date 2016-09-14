<template>
  <div class="row">
    <div class="col-xs-12 col-sm-3">
      <div v-if="isInternshipExist">
        <ul class="list-group">
          <li class="list-group-item" v-for="internship in internships">
            <a href="">

            </a>
          </li>
        </ul>
      </div>
      <div>
        <select name="" class="form-control" v-model="field">
          <option v-for="field in internship_fields" v-bind:value="field.id">{{field.name}}</option>
        </select>
      </div>
      <div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9"></div>
  </div>
</template>

<script>
  export default {
    created(){
      console.log(this.internship_fields)
      $.getJSON('/api/get_fields', function(result){
        this.internship_fields = result;
      })
    },
    ready() {

    },
    data(){
      return{
        internships:[1,2,3,4,5],
        internship_fields: []
      }
    },
    computed(){
      return {
        isInternshipExist: function(){
          return this.internships.length > 0
        }
      }
    }

  }
</script>
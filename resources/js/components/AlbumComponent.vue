<template>
<div>
	<form @submit.prevent="createAlbum" enctype="multipart/form-data" v-if="!success">
	<div class="form-group">
		<label for="name">Name of album</label>
		<input type="text" v-model="name" name="name" class="form-control">
		<span v-if="allerrors.name" :class="['danger']">
					{{allerrors.name[0]}}

				</span>
	</div>

	<div class="form-group">
		<label for="description">Description of album</label>
		<textarea name="description" v-model="description" class="form-control"></textarea>
		<span v-if="allerrors.description" :class="['danger']">
					{{allerrors.description[0]}}

				</span>
	</div>

   <div class="form-group">
		<label for="name">Category of album</label>
		<select name="category" v-model="category" class="form-control">
           <option v-for="(category,index) in categories" :key="index" :value="category.id">
			   {{category.name}}
		   </option>
		</select>
		<span v-if="allerrors.category" :class="['danger']">
					{{allerrors.category[0]}}

				</span>
	</div>

   <div class="form-group">
		<label for="image">Image of album</label>
		<br>
		<input type="file" class="form-control" name="image" v-on:change="onImageChange">
		<span v-if="allerrors.image" :class="['danger']">
					{{allerrors.image[0]}}

				</span>
	</div>

     <br>

	<div class="form-group">
		<button type="submit" class="btn btn-secondary">Create album</button>
	</div>
	</form>
	<div v-if="success">
			<a :href="'/upload/images/'+albumId"> Your album is created. Please click the link to upload the images</a>
		</div>
</div>
</template>
<script type="text/javascript">
export default {
	data(){
		return{
		   name:'',
		   description:'',
		   category:'',
		   image:'',
		   categories:[],
		   albumId:'',
		   success:false,
		   allerrors:[]
		}
	},
	created(){
        this.getCategories()
	},
	methods: {
          getCategories(){
			  axios.get('/api/categories').then((response)=>{
				  this.categories = response.data
			  }).catch((error)=>{
				  alert('unable to fetch categories')
			  })
		  },
		  onImageChange(e){
			  console.log(e)
			  this.image = e.target.files[0];
		  },
		  createAlbum(){
			  const config={
				  headers:{
					  "content-type":"multipart/form-data"
				  }
			  }
			  let formData = new FormData();
			  formData.append('image',this.image);
			  formData.append('name',this.name);
			  formData.append('description',this.description);
			  formData.append('category_id',this.category);
			  axios.post('/albums/store',formData,config).then((response)=>{

			  this.image='',
			  this.name='',
			  this.description='',
			  this.category=''
			  this.albumId = response.data.id
			  console.log(response.data.id)
			  this.success=true

			  }).catch((error)=>{
				  console.log(error)
				  this.allerrors = error.response.data.errors
			  })
		  }
	}
}
</script>
<style scoped>
.danger{
		color: red;
	}
</style>
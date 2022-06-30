<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- llamamos al componente para Crear   -->
                <router-link :to='{name:"nuevo"}' class="btn btn-success float-end m-2">
                    Nuevo Producto <i class="fas fa-plus"></i>
                </router-link>
            </div>
            <div class="col-12">             
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-danger text-white">
                            <tr>
                                <th>SKU</th>
                                <th>Nombre</th>
                                <th>Categorías</th>
                                <th>Inventario</th>
                                <th>Calificación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="producto in productos" :key="producto.id">
                                <td class="col-2">{{ producto.sku }}</td>
                                <td class="col-4">{{ producto.nombre }}</td>
                                <td class="col-2">
                                    <span class="badge bg-primary me-1" v-for="categoria in producto.categorias" :key="categoria.id">
                                        {{ categoria.nombre }}
                                    </span>
                                </td>
                                <td class="col-1">
                                    <i class="fas fa-toggle-on fa-lg text-success" v-if="producto.estado == 'con inventario'" @click="inventario(producto.id, 'sin inventario')"></i>
                                    <i class="fas fa-toggle-off fa-lg text-danger" v-if="producto.estado == 'sin inventario'" @click="inventario(producto.id, 'con inventario')"></i>
                                </td>
                                <td class="col-1">
                                    <star-rating 
                                                    v-model:rating="rating[producto.id]"
                                                    v-bind:increment="1" 
                                                    v-bind:show-rating="false"
                                                    v-bind:max-rating="5" 
                                                    v-bind:active-on-click="true" 
                                                    v-bind:star-size="20"
                                                    :border-width="1"
                                                    @update:rating ="setRating(producto)" 
                                                    active-color="#ffe34a">
                                    </star-rating>
                                    <span class="d-none">{{ estrellas(producto) }}</span>
                                </td>
                                <td class="col-2">
                                    <!-- llamamos al componente para Editar     -->
                                    <router-link :to='{name:"editar",params:{id:producto.id}}' class="text-secondary me-2" title="Editar Producto">
                                        <i class="fas fa-edit"></i>
                                    </router-link>
                                    <a type="button" @click="borrar(producto.id)" class="text-danger me-2" title="Eliminar Producto">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>                          
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:   "productos",
    data()  {

                return {
                    productos:  [],
                    rating:     []
                }
            },
    mounted(){
                // ejecución del metodo a ejecutar cuando se monte la vista
                this.obtenerProductos()
            },
    methods:{
                // metodo para obtener los productos
            async obtenerProductos(){
                    // ruta de nuestra API
                    await axios.get('/api/producto').then(response=>{
                        // la respuesta se almacenará en nuestra variable productos para posteriormente irla recorriendo
                        this.productos  =   response.data
                    }).catch(error=>{
                        this.productos  =   []
                        // en caso de un error lo mostramos solo en consola
                        console.log(error)
                    })
            },
            estrellas(producto) {
                // calculamos el promedio de estrellas que debe tener el producto en base a su calificacion
                let promedio            =   0;
                let items               =   producto.calificaciones.length; 
                if(items > 0){
                    for (var i = 0; i < items; i++) {
                        promedio            +=  parseFloat(producto.calificaciones[i].calificacion)
                    }
    
                    promedio                =   promedio / items
                }
                this.rating[producto.id]=promedio 
            },
            setRating: function(producto){
                // agregamos al objeto producto un nodo de calificacion
                // la calificacion en rating en la posicion del producto
                let nuevaCalificacion       =   {producto_id: producto.id, calificacion:this.rating[producto.id]}
                producto.calificaciones.push(nuevaCalificacion)
                // creamos en axios el nuevo registro en BD
                // calificaciones es un controlador de tipo recurso
                axios.post('/api/evaluacion',nuevaCalificacion).then(response=>{
                    // al ser correcta la petición solo actualizamos el componente
                    this.estrellas(producto)
                }).catch(error=>{
                    console.log(error)
                })
            },
            inventario: function(producto_id, estado){
                let actualizacion       =   {id: producto_id, estado:estado}
                // creamos en axios el nuevo registro en BD
                // calificaciones es un controlador de tipo recurso
                axios.put('/api/producto/'+producto_id, actualizacion).then(response=>{
                    this.obtenerProductos()
                }).catch(error=>{
                    console.log(error)
                })
            },
            borrar(id){
                        // utilizamos sweetalert para mostrar el mensaje de confirmación
                        this.$swal.fire(
                                            {
                                                title: '¿Estas seguro de querer eliminar el producto?',
                                                text: "¡La eliminación no podrá revertirse!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Sí, Eliminarlo!'    
                                            }
                                        ).then((result) => {
                                            // si el mensaje se confirma ejecutamos axios
                                            if (result.isConfirmed) {
                                                // ejecutamos axios con el verbo delete para nuestra API
                                                axios.delete(`/api/producto/${id}`).then(response      =>  {
                                                                                                                // si todo fue correcto entonces recargamos el listado de productos
                                                                                                                this.obtenerProductos()
                                                                                                            }
                                                                                        ).catch(error   =>  {
                                                                                                                // en caso de un error lo mostramos en consola
                                                                                                                console.log(error)
                                                                                                            }
                                                                                        )
                                                    
                                                }
                                            }
                                        )
                    }

            }
}
</script>
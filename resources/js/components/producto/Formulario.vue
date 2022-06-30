<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Producto</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crearEditar">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text" class="form-control" v-model="producto.sku">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label>Nombre del producto</label>
                                        <input type="text" class="form-control" v-model="producto.nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label>Categorías</label>
                                        <input type="text" class="form-control" v-model="producto.categorias">
                                    </div>
                                </div>
                                <div class="col-6 mb-2">
                                    <div class="form-group">
                                        <label>Inventario</label>
                                        <input type="text" class="form-control" v-model="producto.estado">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"crear-editar-producto",
    data(){
        return {
            producto:{
                id:             "",
                sku:            "",
                nombre:         "",
                categorias:     "",
                estado:         "",
                calificacion:   "",
            }
        }
    },
    methods:{
        // async crearEditar(){
        //     let url =   '/api/producto'
        //     if(this.producto.id > 0){
        //         await axios.post(url,this.producto).then(response=>{
        //             this.$router.push({name:"listado"})
        //         }).catch(error=>{
        //             console.log(error)
        //         })
        //     }else{
        //         await axios.put(url,this.producto).then(response=>{
        //             this.$router.push({name:"listado"})
        //         }).catch(error=>{
        //             console.log(error)
        //         })
        //     }
        // }
    }
}
</script>
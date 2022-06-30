

const routes    =   [
                        {
                            name:'listado',
                            path:'/productos', 
                            component:()=> import('./components/Inventario.vue'),
                        },
                        {
                            name:'contacto',
                            path:'/contacto', 
                            component:()=> import('./components/Contacto.vue'),
                        },
                        {
                            name:'nuevo',
                            path:'/crear', 
                            component:()=> import('./components/producto/Formulario.vue'),
                        },
                        {
                            name:'editar',
                            path:'/editar', 
                            component:()=> import('./components/producto/Formulario.vue'),
                        },
                    ]

module.exports      =   function(){
    return routes
}
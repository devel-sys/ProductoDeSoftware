import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

const routes: Routes = [
  { path: '', loadChildren: () => import('../../principal/principal.module').then(m => m.PrincipalModule) },
  { path: 'sign-in', loadChildren: () => import('../../sesion/usuario-sesion/usuario-sesion.module').then(m => m.UsuarioSesionModule) },
  { path: 'sign-up', loadChildren: () => import('../../registro/usuario-registro.module').then(m => m.RegistroModule) },
  { path: 'admin-sign-in', loadChildren: () => import('../../sesion/admin-sesion/admin-sesion.module').then(m => m.AdminSesionModule) },
  { path: 'usuario', loadChildren: () => import('../../usuario/usuario/usuario.module').then(m => m.UsuarioModule) },
  { path: '**', redirectTo: '' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class RouteModule { }

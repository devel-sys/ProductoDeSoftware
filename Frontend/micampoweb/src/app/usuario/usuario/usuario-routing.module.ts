import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from 'src/app/core/guards/auth.guard';
import { UsuarioComponent } from './usuario.component';

const routes: Routes = [
  {path: '', component: UsuarioComponent, canActivateChild: [AuthGuard],
    children: [
      {path: '', pathMatch: 'full', redirectTo: 'mis-campos'},
      {path: 'mis-campos', loadChildren: () => import('../campos/campos.module').then(m => m.CamposModule)},
      {path: 'mis-proyectos', loadChildren: () => import('../proyecto-cultivo/proyecto-cultivo.module').then(m => m.ProyectoCultivoModule)},
      {path: '**', redirectTo: ''}
    ]}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioRoutingModule { }

import { ModuleWithProviders, NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DialogGenericComponent } from '../dialog-generic/dialog-generic.component';
import { DialogAlertComponent } from '../dialog-alert/dialog-alert.component';
import { GlobalErrorService } from '../../services/globalError/global-error.service';
import { MatDialogModule } from '@angular/material/dialog';

@NgModule({
  declarations: [
    DialogAlertComponent,
    DialogGenericComponent
  ],
  imports: [
    CommonModule,
    MatDialogModule,
  ],
  exports: [
    DialogGenericComponent
  ],
  entryComponents: [DialogAlertComponent]
})
export class DialogModule {
  static forRoot(): ModuleWithProviders {
    return {
      ngModule: DialogModule,
      providers: [GlobalErrorService]
    };
  }
}

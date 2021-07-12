import { Component, OnDestroy, OnInit } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { Subject, Subscription } from 'rxjs';
import { GlobalErrorService } from '../../services/globalError/global-error.service';
import { DialogAlertComponent } from '../dialog-alert/dialog-alert.component';
import { takeUntil } from 'rxjs/operators';

@Component({
  selector: 'app-dialog-generic',
  templateUrl: './dialog-generic.component.html',
  styleUrls: ['./dialog-generic.component.scss']
})
export class DialogGenericComponent implements OnInit, OnDestroy {

  private ngUnSubscribe: Subject<boolean> = new Subject<boolean>();
  private isActive = false;
  private errorSubscription: Subscription;

  constructor(
    private errorGlobalService: GlobalErrorService,
    private dialog: MatDialog
  ) { }

  ngOnInit() {
    this.errorGlobalService.getErrorSubject().subscribe({
      next: x => {
        console.log(x);
        this.isActive = true;
        const dialogRef = this.dialog.open(DialogAlertComponent,
          {
            disableClose: x.disableClose || false,
            hasBackdrop: x.hasBackdrop === false ? false : true,
            data: {
              message: x.message || 'Error',
              icon: x.icon || 'error',
              accept: x.accept,
              cancel: x.cancel
            }
          }
        );
        dialogRef.afterClosed().pipe(takeUntil(this.ngUnSubscribe)).subscribe(
          y => {
            console.log(x);
            console.log(y);
            // tslint:disable-next-line: no-unused-expression
            y === true && x.accept && x.accept();
            // tslint:disable-next-line: no-unused-expression
            y === false && x.cancel && x.cancel();
            // tslint:disable-next-line: no-unused-expression
            y === undefined && x.cancel && x.cancel();
            // tslint:disable-next-line: no-unused-expression
            x.afterClosed && x.afterClosed();
          }
        );
        // tslint:disable-next-line: no-unused-expression
        x.autoclose && setTimeout(() => {
          dialogRef.close();
        }, x.autoclose);
      }
    });
  }

  ngOnDestroy() {
    this.ngUnSubscribe.next(true);
    this.ngUnSubscribe.unsubscribe();
  }

}

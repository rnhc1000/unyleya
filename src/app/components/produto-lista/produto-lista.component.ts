import { Component, OnInit } from '@angular/core';
import { Produto } from 'src/app/models/produto.model';
import { ProdutoService } from 'src/app/services/produto.service';

@Component({
  selector: 'app-produto-lista',
  templateUrl: './produto-lista.component.html',
  styleUrls: ['./produto-lista.component.css']
})
export class ProdutoListaComponent implements OnInit{

  produtos?: Produto[];
  currentProduto: Produto = {};
  currentIndex = -1;
  title = '';

  constructor(private produtoService: ProdutoService) { }

  ngOnInit(): void {
    this.retrieveProdutos();
  }

  retrieveProdutos(): void {
    this.produtoService.getAll()
      .subscribe({
        next: (data) => {
          this.produtos = data;
          console.log(data);
        },
        error: (e) => console.error(e)
      });
  }

  refreshList(): void {
    this.retrieveProdutos();
    this.currentProduto = {};
    this.currentIndex = -1;
  }

  setActiveProduto(produto: Produto, index: number): void {
    this.currentProduto = produto;
    this.currentIndex = index;
  }

  removeAllProdutos(): void {
    this.produtoService.deleteAll()
      .subscribe({
        next: (res) => {
          console.log(res);
          this.refreshList();
        },
        error: (e) => console.error(e)
      });
  }

}

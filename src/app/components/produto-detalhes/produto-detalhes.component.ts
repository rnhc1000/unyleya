import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Produto } from 'src/app/models/produto.model';
import { ProdutoService } from 'src/app/services/produto.service';

@Component({
  selector: 'app-produto-detalhes',
  templateUrl: './produto-detalhes.component.html',
  styleUrls: ['./produto-detalhes.component.css']
})
export class ProdutoDetalhesComponent implements OnInit {


  @Input() viewMode = false;

  @Input() currentProduto: Produto = {
    nome: '',
    codigo: '',
    descricao: '',
    quantidade: 0,
    preco: 0
  };
  
  message = '';

  constructor(
    private produtoService: ProdutoService,
    private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    if (!this.viewMode) {
      this.message = '';
      this.getProduto(this.route.snapshot.params["id"]);
    }
  }

  getProduto(id: string): void {
    this.produtoService.get(id)
      .subscribe({
        next: (data) => {
          this.currentProduto = data;
          console.log(data);
        },
        error: (e) => console.error(e)
      });
  }

  updateProduto(): void {
    this.message = '';

    this.produtoService.update(this.currentProduto.id, this.currentProduto)
      .subscribe({
        next: (res) => {
          console.log(res);
          this.message = res.message ? res.message : 'O produto foi atualizado com sucesso!!';
        },
        error: (e) => console.error(e)
      });
  }

  deleteProduto(): void {
    this.produtoService.delete(this.currentProduto.id)
      .subscribe({
        next: (res) => {
          console.log(res);
          this.router.navigate(['/produtos']);
        },
        error: (e) => console.error(e)
      });
  }

}

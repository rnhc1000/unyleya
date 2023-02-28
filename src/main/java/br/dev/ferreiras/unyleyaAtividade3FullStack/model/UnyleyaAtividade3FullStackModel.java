package br.dev.ferreiras.unyleyaAtividade3FullStack.model;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;
@Document(collection = "produtos")
public class UnyleyaAtividade3FullStackModel {

  @Id

  private String id;

  private String nome;
  private String descricao;
  private String codigo;
  private Float preco;
  private Integer quantidade;


  public UnyleyaAtividade3FullStackModel() {

  }

  public UnyleyaAtividade3FullStackModel(String nome, String codigo, String descricao, Float preco, Integer quantidade) {
    this.nome = nome;
    this.descricao = descricao;
    this.codigo = codigo;
    this.preco = preco;
    this.quantidade = quantidade;
  }

  public String getId() {
    return id;
  }
  
  public String getNome() {
    return nome;
  }

  public String getDescricao() {
    return descricao;
  }

  public Float getPreco() {
    return preco;
  }

  public String getCodigo() {
    return codigo;
  }

  public Integer getQuantidade() {
    return quantidade;
  }

  public void setNome(String nome) {
    this.nome = nome;
  }

  public void setDescricao(String descricao) {
    this.descricao = descricao;
  }

  public void setPreco(Float preco) {
    this.preco = preco;
  }

  public void setQuantidade(Integer quantidade) {
    this.quantidade = quantidade;
  }

  public void setCodigo(String codigo) {
    this.codigo = codigo;
  }

  @Override
  public String toString() {

    return "Produto [id=]" + id + ", nome" + nome + ", descricao" + descricao + ", preco" + preco + ", quantidade" + quantidade + "]";

  }

  
}

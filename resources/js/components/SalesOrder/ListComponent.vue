<template>
  <div class="container">
      <div class="row">
          <h2>Sales Order Lists</h2>
          <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">REF</th>
      <th scope="col">Date</th>
      <th scope="col">Sales</th>
      <th scope="col">Amount</th>
      <th scope="col">Channel</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td>Mark</td>
      <td class="text-center"><button class="btn btn-primary">Details</button></td>
    </tr>
  </tbody>
</table>

<nav>
  <ul class="pagination pagination-md">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
      </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>

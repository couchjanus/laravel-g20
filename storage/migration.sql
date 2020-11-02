
   Illuminate\Database\QueryException 

  SQLSTATE[HY000] [1045] Access denied for user 'root'@'localhost' (using password: NO) (SQL: select * from information_schema.tables where table_schema = laravel and table_name = migrations and table_type = 'BASE TABLE')

  at vendor/laravel/framework/src/Illuminate/Database/Connection.php:671
    667▕         // If an exception occurs when attempting to run a query, we'll format the error
    668▕         // message to include the bindings with SQL, which will make this exception a
    669▕         // lot more helpful to the developer instead of just the database's errors.
    670▕         catch (Exception $e) {
  ➜ 671▕             throw new QueryException(
    672▕                 $query, $this->prepareBindings($bindings), $e
    673▕             );
    674▕         }
    675▕

      [2m+33 vendor frames [22m
  34  artisan:37
      Illuminate\Foundation\Console\Kernel::handle()

<?php
/*
 * 使用:
 * $page = new Page(连接符,查询语句,当前页码,每页大小,页码符)
 * 连接符:一个MYSQL连接标识符,如果该参数留空,则使用最近一个连接
 * 查询语句:SQL语句
 * 当前页码:指定当前是第几页
 * 每页大小:每页显示的记录数
 * 页码符:指定当前页面URL格式
 *
 * 使用例子:
 * $sql = "select * from aa";
 * $page = new Page($conn,$sql,$_GET['page'],4,"?page=");
 *
 * 获得当前页码
 * $page->page;
 *
 * 获得总页数
 * $page->pageCount;
 *
 * 获得总记录数
 * $page->rowCount;
 *
 * 获得本页记录数
 * $page->listSize;
 *
 * 获得记录集
 * $page->list;
 * 记录集是一个2维数组,例:list[0]['id']访问第一条记录的id字段值.
 *
 * 获得页码列表
 * $page->getPageList();
 */
class Page
{

    //构造函数
    function news($pageNum = 1, $pageSize = 3)
    {
        $array = array();
        $coon = mysqli_connect('localhost', 'root','123456');
        mysqli_select_db($coon, "lab11");
        mysqli_set_charset($coon, "utf8");
        // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
        $rs = "select * from sheet1 limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
        $r = mysqli_query($coon, $rs);
        while ($obj = mysqli_fetch_array($r)) {
            $array[] = $obj;
        }
        mysqli_close($coon);
        return $array;
    }

    //显示总页数的函数
    function allNews()
    {
        $coon = mysqli_connect('localhost', 'root','123456');
        mysqli_select_db($coon, "lab11");
        mysqli_set_charset($coon, "utf8");
        $rs = "select count(*)num  from sheet1"; //可以显示出总页数
        $r = mysqli_query($coon, $rs);
        $obj = mysqli_fetch_object($r);
        mysqli_close($coon);
        return $obj->num;
    }
    /*
     * getPageList方法生成一个较简单的页码列表
     * 如果需要定制页码列表,可以修改这里的代码,或者使用总页数/总记录数等信息进行计算生成.
     */
    function getPageList()
    {

        $pageList= '';
        $allNum = allNews();
        $pageSize = 5; //约定每页显示几条信息
        $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
        $endPage = ceil($allNum/$pageSize); //总页数
        $array = news($pageNum,$pageSize);
        //如果页码>1则显示首页连接

            $firstPage = "<a href=?pageNum= 1>首页</a>";

        //如果页码>1则显示上一页连接

            $previousPage = "<a href=?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>上一页</a>";

        //如果没到尾页则显示下一页连接

            $nextPage = "<a href=?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>下一页</a>";

        //如果没到尾页则显示尾页连接" ".

            $lastPage = "<a href=?pageNum=<?php echo $endPage?>尾页</a>";

        //所有页码列表
        for($i =1;$i<=$endPage;$i++){
            if($i == $pageNum){
                $currentPage = " "."$i"." ";
        }
            else{
                $currentPage = " ". "<a href=' ?pageNum= $i'>$i</a>"." ";
            }$pageList .= $currentPage;
        }
        return $firstPage." ".$previousPage." ".$pageList." ".$nextPage." ".$lastPage." ";
    }
}
?>
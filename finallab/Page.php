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


    function getPageList()
    {

        $pageList= '';
        $allNum = allNews();
        $pageSize = 5; //约定每页显示几条信息
        $pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
        $endPage = ceil($allNum/$pageSize); //总页数

        for($i =1;$i<=$endPage;$i++){
            if($i == $pageNum){
                $currentPage = " "."$i"." ";
        }
            else{
                $currentPage = " ". "<a href=' ?pageNum= $i'>$i</a>"." ";
            }$pageList .= $currentPage;
        }
        return $pageList;
    }
}
?>
<?php
    include('configs/validate.php');
    include('configs/functions.php');
    include('services/CategoryService.php');
    class CategoryController {
        public function index()
        {
            //Lấy dữ liệu
            $title = "Thể loại";
            $success = $_GET['success'] ?? null;
            $failure = $_GET['failure'] ?? null;

            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategory();
            //Truyền tới view
            include('views/category/list_category.php');
        }

        public function add_edit()
        {
            $title = 'Sửa thể loại';
            $categoryService = new CategoryService();
            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $category = new Category('', '', '');
            $errors = [
                'warning' => '',
                'ten_tloai' => '',
            ];

            if($id){
                $category = $categoryService->getCategoryDetail($id);
                
                if(!$category){
                    redirect('?controller=category&failure=Không+tìm+thấy+thể+loại');
                }
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $category->setTen_tloai( $_POST['ten_tloai']);

                $errors['ten_tloai'] = (is_text($category->getTen_tloai(), 1, 24)) ? '' : 'Tên thể loại phải từ 1 - 24 kí tự';

                $invalid = implode($errors);
                if($invalid){
                    $errors['warning'] = 'Hãy sửa các lỗi ở trên';
                }
                else{
                    $arguments = [
                        'ma_tloai' => $category->getMa_tloai(),
                        'ten_tloai' => $category->getTen_tloai()
                    ];

                    if($id){
                        $categoryService->updateCategory($arguments);
                    }
                    else{
                        unset($arguments['ma_tloai']);
                        $categoryService->insertCategory($arguments);
                    }
                   
                    redirect('?controller=category&success=Đã+lưu+thể+loại');
                }
            }
            include("views/category/add_edit_category.php");
        }

        public function delete()
        {
            $title = 'Xóa thể loại';

            $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            if(!$id){
                redirect('?controller=category&failure=Không+tìm+thấy+thể+loại');
            }

            $category = false;
            $categoryService = new CategoryService();
            $category = $categoryService->getCategoryDetail($id);
            if(!$category){
                redirect('?controller=category&failure=Không+tìm+thấy+thể+loại');
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                try{
                    $categoryService->deleteCategory($id);
                    redirect('?controller=category&success=Đã+xóa+thể+loại');
                }
                catch(PDOException $e){
                    if($e->errorInfo[1] == 1451){
                        redirect('?controller=category&failure=Không+thể+xóa+thể+loại+chứa+bài+viết+khác');
                    }
                    else{
                        throw $e;
                    }
                }
            }
            include("views/category/delete_category.php");
        }
    }
?>
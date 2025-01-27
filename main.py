import os
import re

def extract_number(file_name):
    """
    提取文件名中纯数字部分。
    """
    match = re.search(r'(\d+)', file_name)
    if match:
        return int(match.group(1))
    return float('inf')  # 如果没有数字，则返回一个很大的数字，确保排在最后

def extract_code(folder_name):
    """
    提取文件夹名中横线中间的四字代码部分。
    """
    match = re.search(r'-(\w{4})-', folder_name)
    if match:
        return match.group(1)
    return folder_name  # 如果没有找到四字代码，则返回整个文件夹名

def get_airport_data(airport_pdfs_path):
    airports = []

    # 遍历机场文件夹
    for folder_name in os.listdir(airport_pdfs_path):
        folder_path = os.path.join(airport_pdfs_path, folder_name)

        # 确保是文件夹
        if os.path.isdir(folder_path):
            pages = []

            # 遍历文件夹中的文件
            for file_name in os.listdir(folder_path):
                if file_name.endswith('.pdf'):  # 确保是PDF文件
                    pages.append(file_name)

            # 按文件名中的数字部分排序
            pages.sort(key=extract_number)

            # 添加到机场数据中
            airports.append({
                "name": folder_name,
                "folder": folder_name,
                "pages": pages
            })

    # 按文件夹名中的四字代码部分排序
    airports.sort(key=lambda x: extract_code(x['name']))

    return airports

def write_to_file(airports, output_file):
    with open(output_file, 'w', encoding='utf-8') as f:
        f.write("// 机场数据\n")
        f.write("const airports = [\n")

        for airport in airports:
            f.write("    {\n")
            f.write(f'        name: "{airport["name"]}",\n')
            f.write(f'        folder: "{airport["folder"]}",\n')
            f.write(f'        pages: {airport["pages"]}\n')
            f.write("    },\n")

        f.write("];\n")

# 主程序
if __name__ == "__main__":
    airport_pdfs_path = "airport_pdfs"  # 机场PDF文件夹路径
    output_file = "airport_data.txt"  # 输出文件路径

    # 获取机场数据
    airports = get_airport_data(airport_pdfs_path)

    # 写入文件
    write_to_file(airports, output_file)

    print(f"机场数据已写入 {output_file}")
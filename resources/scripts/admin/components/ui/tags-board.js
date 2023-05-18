import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { Box, Button, Grid, TextField } from '@mui/material';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';
import { ApiRoute, dataGridLocalText } from '../../const';

export default function TagsBoard() {
  const [rows, setRows] = useState([]);

  const handleDeleteButtonClick = (id, title) => () => {
    const isConfirmed = window.confirm(
      `Вы уверены что хотите безвозвратно удалить ${title}?`
    );

    isConfirmed &&
      axios
        .post(ApiRoute.Tags['delete'], { id })
        .then(({ data }) => {
          toast.success(data.message);
          setRows([...rows.filter((row) => row.id !== id)]);
        })
        .catch(({ response }) => toast.error(response.data.message));
  };

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios
      .post(ApiRoute.Tags['store'], { title: evt.target.title.value })
      .then(({ data }) => {
        toast.success(data.message);
        setRows([data.tag, ...rows])
        evt.target.reset();
      })
      .catch((error) => console.log(error));
  };

  const handleProcessRowUpdate = (newRow) => {
    axios.post(ApiRoute.Tags['update'], newRow)
      .then(({ data }) => toast.success(data.message))
      .catch((error) => console.log(error));

    return newRow;
  }

  const columns = [
    {
      field: 'id',
      headerName: 'ID',
      align: 'center',
      headerAlign: 'center',
      width: 50,
    },
    {
      field: 'title',
      headerName: 'Название',
      width: 400,
      editable: true,
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 120,
      align: 'right',
      headerAlign: 'center',
      renderCell: (params) => (
        <Stack spacing={1} direction="row" alignItems="center">
          <Button
            variant="contained"
            color="error"
            size="small"
            onClick={handleDeleteButtonClick(params.row.id, params.row.title)}
          >
            Удалить
          </Button>
        </Stack>
      ),
    },
  ];

  useEffect(() => {
    axios.get(ApiRoute.Tags['index'])
      .then(({ data }) => {
        setRows(data.map(({ id, title }) => ({ id, title })));
      })
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  return (
    <Grid container spacing={2} marginTop={0}>
      <Grid item xs={6}>
        <Box
          component="form"
          sx={{
            padding: 2,
            backgroundColor: 'white',
            borderRadius: 1,
            display: 'flex',
            gap: 1,
            marginBottom: 1,
          }}
          onSubmit={handleFormSubmit}
        >
          <TextField
            fullWidth
            name="title"
            type="text"
            label="Название"
            placeholder="Введите название категории"
            required
            size="small"
          />

          <Button
            type="submit"
            color="success"
            variant="contained"
            sx={{ width: '160px' }}
          >
            Добавить
          </Button>
        </Box>

        <DataGrid
          sx={{ backgroundColor: 'white', height: 631 }}
          rows={rows}
          columns={columns}
          pageSize={10}
          rowsPerPageOptions={[10]}
          disableSelectionOnClick
          experimentalFeatures={{ newEditingApi: true }}
          localeText={dataGridLocalText}
          processRowUpdate={handleProcessRowUpdate}
        />
      </Grid>
    </Grid>
  );
}
